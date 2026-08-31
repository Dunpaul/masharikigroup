<?php

namespace App\Http\Controllers;

use App\Models\Exhibitor;
use App\Models\MarketSettings;
use App\Models\NonExhibitor;
use App\Models\Student;
use App\Models\VirtualAttendant;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TicketController extends Controller
{
    protected function registrantModels(): array
    {
        return [
            'exhibitor' => ['model' => Exhibitor::class, 'label' => 'Exhibitor'],
            'non_exhibitor' => ['model' => NonExhibitor::class, 'label' => 'Non-Exhibitor'],
            'student' => ['model' => Student::class, 'label' => 'Student'],
            'virtual_attendant' => ['model' => VirtualAttendant::class, 'label' => 'Virtual Attendant'],
        ];
    }

    public function show(string $type, string $registrationId): View|RedirectResponse
    {
        $registryEntry = $this->registrantModels()[$type] ?? null;

        abort_if($registryEntry === null, 404);

        $registrant = $registryEntry['model']::where('registration_id', $registrationId)->first();

        abort_if($registrant === null, 404);

        if ($registrant->payment_status !== 'paid') {
            return redirect()
                ->route('market.home')
                ->with('error', 'This registration is not yet confirmed as paid, so a ticket is not available yet.');
        }

        return view('market.ticket', [
            'registrant' => $registrant,
            'typeLabel' => $registryEntry['label'],
            'settings' => MarketSettings::current(),
        ]);
    }
}
