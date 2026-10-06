<?php

namespace App\Http\Controllers;

use App\Models\Exhibitor;
use App\Models\NonExhibitor;
use App\Models\VirtualAttendant;
use App\Services\PesapalService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    protected function registrantModels(): array
    {
        return [
            'exhibitor' => Exhibitor::class,
            'non_exhibitor' => NonExhibitor::class,
            'virtual_attendant' => VirtualAttendant::class,
        ];
    }

    protected function registrationRoutes(): array
    {
        return [
            'exhibitor' => 'market.exhibitors.create',
            'non_exhibitor' => 'market.non-exhibitors.create',
            'virtual_attendant' => 'market.virtual-attendants.create',
        ];
    }

    public function initiate(string $type, string $registrationId, PesapalService $pesapal): RedirectResponse
    {
        $modelClass = $this->registrantModels()[$type] ?? null;

        abort_if($modelClass === null, 404);

        $registrant = $modelClass::where('registration_id', $registrationId)->firstOrFail();

        if ($registrant->payment_status === 'paid') {
            return redirect()->route('market.ticket.show', ['type' => $type, 'registrationId' => $registrationId]);
        }

        $merchantReference = strtoupper($type).'-'.$registrant->registration_id.'-'.now()->timestamp;
        $registrant->update(['payment_reference' => $merchantReference]);

        try {
            $response = $pesapal->submitOrder([
                'id' => $merchantReference,
                'currency' => $registrant->currency,
                'amount' => $registrant->amount,
                'description' => ucfirst(str_replace('_', ' ', $type)).' registration — '.$registrant->registration_id,
                'callback_url' => route('market.payments.callback'),
                'billing_address' => [
                    'email_address' => $registrant->company_contact_email,
                    'phone_number' => $registrant->company_contact_phone,
                    'first_name' => $registrant->company_contact_first_name,
                    'last_name' => $registrant->company_contact_last_name,
                ],
            ]);
        } catch (\Throwable $e) {
            Log::error('Pesapal payment initiation failed', [
                'registration_id' => $registrant->registration_id,
                'error' => $e->getMessage(),
            ]);

            return redirect()
                ->route($this->registrationRoutes()[$type])
                ->with('error', "We couldn't start payment right now. Please try again in a moment, or contact us with reference {$registrant->registration_id}.");
        }

        if (empty($response['redirect_url'])) {
            Log::error('Pesapal payment initiation returned no redirect_url', [
                'registration_id' => $registrant->registration_id,
                'response' => $response,
            ]);

            return redirect()
                ->route($this->registrationRoutes()[$type])
                ->with('error', "We couldn't start payment right now. Please try again in a moment, or contact us with reference {$registrant->registration_id}.");
        }

        $registrant->update(['pesapal_order_tracking_id' => $response['order_tracking_id']]);

        return redirect()->away($response['redirect_url']);
    }

    public function callback(Request $request): RedirectResponse
    {
        return $this->handleStatusCheck(
            $request->query('OrderTrackingId'),
            $request->query('OrderMerchantReference'),
        );
    }

    public function webhook(Request $request): \Illuminate\Http\Response
    {
        $this->handleStatusCheck(
            $request->query('OrderTrackingId'),
            $request->query('OrderMerchantReference'),
        );

        // Pesapal's IPN just needs a 200 — it doesn't follow the redirect.
        return response('OK', 200);
    }

    protected function handleStatusCheck(?string $orderTrackingId, ?string $merchantReference): RedirectResponse
    {
        [$type, $registrant] = $this->findByReference($merchantReference);

        if (! $registrant) {
            return redirect()->route('market.home')->with('error', 'We could not find that payment reference.');
        }

        if (! $orderTrackingId) {
            return redirect()
                ->route($this->registrationRoutes()[$type])
                ->with('error', "Payment was not completed. Your registration ({$registrant->registration_id}) is saved — you can try paying again from this page.");
        }

        return $this->confirmPayment($type, $registrant, $orderTrackingId)
            ? redirect()->route('market.ticket.show', ['type' => $type, 'registrationId' => $registrant->registration_id])
                ->with('success', 'Payment confirmed! Your ticket is ready below.')
            : redirect()
                ->route($this->registrationRoutes()[$type])
                ->with('error', "We couldn't confirm that payment. Your registration ({$registrant->registration_id}) is saved — you can try paying again from this page.");
    }

    /**
     * @return array{0: ?string, 1: ?\Illuminate\Database\Eloquent\Model}
     */
    protected function findByReference(?string $merchantReference): array
    {
        if (! $merchantReference) {
            return [null, null];
        }

        foreach ($this->registrantModels() as $type => $modelClass) {
            $registrant = $modelClass::where('payment_reference', $merchantReference)->first();

            if ($registrant) {
                return [$type, $registrant];
            }
        }

        return [null, null];
    }

    /**
     * The authoritative check: re-verify the transaction with Pesapal
     * rather than trusting the redirect query string or IPN call — Pesapal
     * doesn't sign either of those, so GetTransactionStatus is the only
     * trustworthy source of truth.
     */
    protected function confirmPayment(string $type, $registrant, string $orderTrackingId): bool
    {
        try {
            $status = app(PesapalService::class)->getTransactionStatus($orderTrackingId);
        } catch (\Throwable $e) {
            Log::error('Pesapal transaction status check failed', [
                'registration_id' => $registrant->registration_id,
                'order_tracking_id' => $orderTrackingId,
                'error' => $e->getMessage(),
            ]);

            return false;
        }

        $verified = ($status['payment_status_description'] ?? null) === 'Completed'
            && ($status['merchant_reference'] ?? null) === $registrant->payment_reference
            && (float) ($status['amount'] ?? 0) >= (float) $registrant->amount
            && ($status['currency'] ?? null) === $registrant->currency;

        if (! $verified) {
            Log::warning('Pesapal transaction verification mismatch', [
                'registration_id' => $registrant->registration_id,
                'order_tracking_id' => $orderTrackingId,
                'status' => $status,
            ]);

            $registrant->update(['payment_status' => 'failed']);

            return false;
        }

        $registrant->update([
            'payment_status' => 'paid',
            'pesapal_order_tracking_id' => $orderTrackingId,
            'paid_at' => now(),
        ]);

        return true;
    }
}