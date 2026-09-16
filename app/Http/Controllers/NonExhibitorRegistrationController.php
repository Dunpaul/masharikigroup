<?php

namespace App\Http\Controllers;

use App\Models\MarketSettings;
use App\Models\NonExhibitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class NonExhibitorRegistrationController extends Controller
{
    public function create(): View
    {
        return view('market.register-non-exhibitor');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_contact_first_name' => 'required|string|max:255',
            'company_contact_last_name' => 'required|string|max:255',
            'company_contact_phone' => 'required|string|max:50',
            'company_contact_email' => 'required|email|max:255|unique:non_exhibitors,company_contact_email',
            'designation' => 'required|string|max:255',
            'attending_as' => 'required|in:buyer,seller,vendor,official,visitor,press',
            'company_contact_alt_first_name' => 'nullable|string|max:255',
            'company_contact_alt_last_name' => 'nullable|string|max:255',
            'company_contact_alt_phone' => 'nullable|string|max:50',
            'company_contact_alt_email' => 'nullable|email|max:255',
            'company_name' => 'required|string|max:255',
            'company_address' => 'required|string|max:255',
            'company_phone' => 'required|string|max:50',
            'company_email' => 'required|email|max:255',
            'company_website' => 'required|string|max:255',
            'company_services' => 'required|string|max:255',
            'company_services_exhibited' => 'required|string|max:2000',
            'company_provisions' => 'nullable|array',
            'company_products' => 'nullable|array',
            'company_products_other' => 'nullable|string|max:2000',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $settings = MarketSettings::current();

        $registrant = NonExhibitor::create([
            ...$validated,
            'registration_id' => NonExhibitor::generateRegistrationId(),
            'payment_status' => 'unpaid',
            'amount' => $settings->non_exhibitor_fee,
            'currency' => $settings->fee_currency,
        ]);

        try {
            Mail::raw(
                "Dear {$registrant->company_contact_first_name},\n\n".
                "Thank you for registering as a non-exhibitor for Masharket. Your registration reference is {$registrant->registration_id}. You'll now be redirected to complete payment.\n\n".
                'Masharket Team',
                function ($message) use ($registrant) {
                    $message->to($registrant->company_contact_email)
                        ->subject('Masharket Non-Exhibitor Registration Received');
                }
            );
        } catch (\Exception $e) {
            Log::warning('Non-exhibitor confirmation email failed', ['error' => $e->getMessage()]);
        }

        return redirect()->route('market.payments.initiate', ['type' => 'non_exhibitor', 'registrationId' => $registrant->registration_id]);
    }
}
