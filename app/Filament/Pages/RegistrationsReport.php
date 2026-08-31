<?php

namespace App\Filament\Pages;

use App\Models\Exhibitor;
use App\Models\NonExhibitor;
use App\Models\Student;
use App\Models\VirtualAttendant;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Collection;

class RegistrationsReport extends Page
{
    protected string $view = 'filament.pages.registrations-report';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedChartBar;

    protected static string|\UnitEnum|null $navigationGroup = 'Masharket';

    protected static ?string $navigationLabel = 'Registrations Report';

    public function getRegistrants(): Collection
    {
        return collect()
            ->concat(Exhibitor::all()->map(fn ($r) => $this->row($r, 'Exhibitor')))
            ->concat(NonExhibitor::all()->map(fn ($r) => $this->row($r, 'Non-Exhibitor')))
            ->concat(Student::all()->map(fn ($r) => $this->row($r, 'Student')))
            ->concat(VirtualAttendant::all()->map(fn ($r) => $this->row($r, 'Virtual Attendant')))
            ->sortByDesc('registered_at')
            ->values();
    }

    protected function row($registrant, string $typeLabel): array
    {
        return [
            'registration_id' => $registrant->registration_id,
            'type' => $typeLabel,
            'name' => "{$registrant->company_contact_first_name} {$registrant->company_contact_last_name}",
            'email' => $registrant->company_contact_email,
            'organization' => $registrant->company_name ?? $registrant->school_name ?? '—',
            'payment_status' => $registrant->payment_status,
            'registered_at' => $registrant->created_at,
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('exportCsv')
                ->label('Export CSV')
                ->icon('heroicon-o-arrow-down-tray')
                ->url(route('admin.exports.registrations'))
                ->openUrlInNewTab(),
        ];
    }
}
