<?php

namespace App\Http\Controllers;

use App\Support\RegistrantLocator;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RegistrantDashboardController extends Controller
{
    public function show(Request $request): View
    {
        [$type, $registrant] = $this->currentRegistrant($request);

        return view('market.dashboard', [
            'type' => $type,
            'typeLabel' => RegistrantLocator::label($type),
            'registrant' => $registrant,
        ]);
    }

    public function update(Request $request)
    {
        [$type, $registrant] = $this->currentRegistrant($request);

        $rules = [
            'company_contact_first_name' => 'required|string|max:255',
            'company_contact_last_name' => 'required|string|max:255',
            'company_contact_phone' => 'required|string|max:50',
            'designation' => 'required|string|max:255',
        ];

        if (isset($registrant->company_name)) {
            $rules = array_merge($rules, [
                'company_name' => 'required|string|max:255',
                'company_address' => 'required|string|max:255',
                'company_phone' => 'required|string|max:50',
                'company_email' => 'required|email|max:255',
                'company_website' => 'required|string|max:255',
            ]);
        } else {
            $rules = array_merge($rules, [
                'school_name' => 'required|string|max:255',
                'school_address' => 'required|string|max:255',
                'school_phone' => 'required|string|max:50',
                'school_email' => 'required|email|max:255',
                'school_website' => 'required|string|max:255',
            ]);
        }

        $validated = $request->validate($rules);

        $registrant->update($validated);

        return back()->with('success', 'Your details have been updated.');
    }

    protected function currentRegistrant(Request $request): array
    {
        $type = $request->session()->get('registrant_type');
        $registrant = RegistrantLocator::find($type, $request->session()->get('registrant_id'));

        abort_if($registrant === null, 404);

        return [$type, $registrant];
    }
}
