<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exhibitor;
use App\Models\NonExhibitor;
use App\Models\Student;
use App\Models\VirtualAttendant;
use Symfony\Component\HttpFoundation\StreamedResponse;

class RegistrationsExportController extends Controller
{
    public function csv(): StreamedResponse
    {
        $registrants = collect()
            ->concat(Exhibitor::all()->map(fn ($r) => $this->row($r, 'Exhibitor')))
            ->concat(NonExhibitor::all()->map(fn ($r) => $this->row($r, 'Non-Exhibitor')))
            ->concat(Student::all()->map(fn ($r) => $this->row($r, 'Student')))
            ->concat(VirtualAttendant::all()->map(fn ($r) => $this->row($r, 'Virtual Attendant')))
            ->sortByDesc('registered_at');

        $filename = 'masharket-registrations-'.now()->format('Y-m-d').'.csv';

        return response()->streamDownload(function () use ($registrants) {
            $handle = fopen('php://output', 'w');

            fputcsv($handle, ['Registration ID', 'Type', 'First Name', 'Last Name', 'Email', 'Phone', 'Organization', 'Designation', 'Attending As', 'Payment Status', 'Registered At']);

            foreach ($registrants as $row) {
                fputcsv($handle, $row);
            }

            fclose($handle);
        }, $filename, ['Content-Type' => 'text/csv']);
    }

    protected function row($registrant, string $typeLabel): array
    {
        return [
            'registration_id' => $registrant->registration_id,
            'type' => $typeLabel,
            'first_name' => $registrant->company_contact_first_name,
            'last_name' => $registrant->company_contact_last_name,
            'email' => $registrant->company_contact_email,
            'phone' => $registrant->company_contact_phone,
            'organization' => $registrant->company_name ?? $registrant->school_name ?? '',
            'designation' => $registrant->designation,
            'attending_as' => $registrant->attending_as,
            'payment_status' => $registrant->payment_status,
            'registered_at' => $registrant->created_at->toDateTimeString(),
        ];
    }
}
