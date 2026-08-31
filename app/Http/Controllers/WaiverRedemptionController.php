<?php

namespace App\Http\Controllers;

use App\Models\Exhibitor;
use App\Models\NonExhibitor;
use App\Models\VirtualAttendant;
use App\Models\WaiverCode;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WaiverRedemptionController extends Controller
{
    protected function registrantModels(): array
    {
        return [
            'exhibitor' => Exhibitor::class,
            'non_exhibitor' => NonExhibitor::class,
            'virtual_attendant' => VirtualAttendant::class,
        ];
    }

    public function create(): View
    {
        return view('market.redeem-waiver');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'registration_type' => 'required|in:exhibitor,non_exhibitor,virtual_attendant',
            'company_contact_email' => 'required|email',
            'waiver_code' => 'required|string',
        ]);

        $waiverCode = WaiverCode::where('code', strtoupper($validated['waiver_code']))
            ->where('available', true)
            ->first();

        if (! $waiverCode) {
            return back()->withInput()->with('error', 'That waiver code is invalid or has already been used.');
        }

        $modelClass = $this->registrantModels()[$validated['registration_type']];
        $registrant = $modelClass::where('company_contact_email', $validated['company_contact_email'])->first();

        if (! $registrant) {
            return back()->withInput()->with('error', 'No registration found with that email for the selected registration type.');
        }

        if ($registrant->payment_status === 'paid') {
            return back()->withInput()->with('error', 'This registration has already been marked as paid.');
        }

        $registrant->update(['payment_status' => 'paid']);

        $waiverCode->update([
            'available' => false,
            'used_by_type' => $validated['registration_type'],
            'used_by_email' => $validated['company_contact_email'],
            'used_at' => now(),
        ]);

        return redirect()
            ->route('market.ticket.show', ['type' => $validated['registration_type'], 'registrationId' => $registrant->registration_id])
            ->with('success', 'Waiver applied! Your registration is now confirmed.');
    }
}
