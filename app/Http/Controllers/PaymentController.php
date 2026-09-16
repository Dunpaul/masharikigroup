<?php

namespace App\Http\Controllers;

use App\Models\Exhibitor;
use App\Models\NonExhibitor;
use App\Models\VirtualAttendant;
use App\Services\FlutterwaveService;
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

    public function initiate(string $type, string $registrationId, FlutterwaveService $flutterwave): RedirectResponse
    {
        $modelClass = $this->registrantModels()[$type] ?? null;

        abort_if($modelClass === null, 404);

        $registrant = $modelClass::where('registration_id', $registrationId)->firstOrFail();

        if ($registrant->payment_status === 'paid') {
            return redirect()->route('market.ticket.show', ['type' => $type, 'registrationId' => $registrationId]);
        }

        $txRef = strtoupper($type).'-'.$registrant->registration_id.'-'.now()->timestamp;
        $registrant->update(['payment_reference' => $txRef]);

        try {
            $response = $flutterwave->initiatePayment([
                'tx_ref' => $txRef,
                'amount' => $registrant->amount,
                'currency' => $registrant->currency,
                'redirect_url' => route('market.payments.callback'),
                'customer' => [
                    'email' => $registrant->company_contact_email,
                    'name' => "{$registrant->company_contact_first_name} {$registrant->company_contact_last_name}",
                    'phonenumber' => $registrant->company_contact_phone,
                ],
                'customizations' => [
                    'title' => 'Masharket Registration',
                    'description' => ucfirst(str_replace('_', ' ', $type)).' registration — '.$registrant->registration_id,
                ],
            ]);
        } catch (\Throwable $e) {
            Log::error('Flutterwave payment initiation failed', [
                'registration_id' => $registrant->registration_id,
                'error' => $e->getMessage(),
            ]);

            return redirect()
                ->route($this->registrationRoutes()[$type])
                ->with('error', "We couldn't start payment right now. Please try again in a moment, or contact us with reference {$registrant->registration_id}.");
        }

        return redirect()->away($response['data']['link']);
    }

    public function callback(Request $request): RedirectResponse
    {
        $txRef = $request->query('tx_ref');
        $transactionId = $request->query('transaction_id');
        $status = $request->query('status');

        [$type, $registrant] = $this->findByReference($txRef);

        if (! $registrant) {
            return redirect()->route('market.home')->with('error', 'We could not find that payment reference.');
        }

        if ($status !== 'successful' || ! $transactionId) {
            $registrant->update(['payment_status' => 'failed']);

            return redirect()
                ->route($this->registrationRoutes()[$type])
                ->with('error', "Payment was not completed. Your registration ({$registrant->registration_id}) is saved — you can try paying again from this page.");
        }

        return $this->confirmPayment($type, $registrant, $transactionId)
            ? redirect()->route('market.ticket.show', ['type' => $type, 'registrationId' => $registrant->registration_id])
                ->with('success', 'Payment confirmed! Your ticket is ready below.')
            : redirect()
                ->route($this->registrationRoutes()[$type])
                ->with('error', "We couldn't confirm that payment. Your registration ({$registrant->registration_id}) is saved — you can try paying again from this page.");
    }

    public function webhook(Request $request): \Illuminate\Http\Response
    {
        if (! hash_equals((string) config('services.flutterwave.webhook_secret_hash'), (string) $request->header('verif-hash'))) {
            abort(401);
        }

        $data = $request->input('data', []);
        $txRef = $data['tx_ref'] ?? null;
        $transactionId = $data['id'] ?? null;
        $status = $data['status'] ?? null;

        [$type, $registrant] = $this->findByReference($txRef);

        if ($registrant && $status === 'successful' && $transactionId && $registrant->payment_status !== 'paid') {
            $this->confirmPayment($type, $registrant, (string) $transactionId);
        }

        return response('OK', 200);
    }

    /**
     * @return array{0: ?string, 1: ?\Illuminate\Database\Eloquent\Model}
     */
    protected function findByReference(?string $txRef): array
    {
        if (! $txRef) {
            return [null, null];
        }

        foreach ($this->registrantModels() as $type => $modelClass) {
            $registrant = $modelClass::where('payment_reference', $txRef)->first();

            if ($registrant) {
                return [$type, $registrant];
            }
        }

        return [null, null];
    }

    /**
     * The authoritative check: re-verify the transaction with Flutterwave
     * rather than trusting the redirect query string or webhook payload.
     */
    protected function confirmPayment(string $type, $registrant, string $transactionId): bool
    {
        try {
            $verification = app(FlutterwaveService::class)->verifyTransaction($transactionId);
        } catch (\Throwable $e) {
            Log::error('Flutterwave transaction verification failed', [
                'registration_id' => $registrant->registration_id,
                'transaction_id' => $transactionId,
                'error' => $e->getMessage(),
            ]);

            return false;
        }

        $data = $verification['data'] ?? [];

        $verified = ($data['status'] ?? null) === 'successful'
            && ($data['tx_ref'] ?? null) === $registrant->payment_reference
            && (float) ($data['amount'] ?? 0) >= (float) $registrant->amount
            && ($data['currency'] ?? null) === $registrant->currency;

        if (! $verified) {
            Log::warning('Flutterwave transaction verification mismatch', [
                'registration_id' => $registrant->registration_id,
                'transaction_id' => $transactionId,
                'verification' => $data,
            ]);

            $registrant->update(['payment_status' => 'failed']);

            return false;
        }

        $registrant->update([
            'payment_status' => 'paid',
            'flutterwave_transaction_id' => (string) $transactionId,
            'paid_at' => now(),
        ]);

        return true;
    }
}
