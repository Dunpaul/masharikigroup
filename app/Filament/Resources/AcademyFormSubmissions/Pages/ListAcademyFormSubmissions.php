<?php

namespace App\Filament\Resources\AcademyFormSubmissions\Pages;

use App\Filament\Resources\AcademyFormSubmissions\AcademyFormSubmissionResource;
use App\Models\AcademyCohort;
use App\Models\AcademyFormField;
use App\Models\AcademyFormSubmission;
use Filament\Actions\Action;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;

class ListAcademyFormSubmissions extends ListRecords
{
    protected static string $resource = AcademyFormSubmissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('export')
                ->label('Export CSV')
                ->action(fn () => $this->exportCsv()),
        ];
    }

    /**
     * One tab per cohort — closing a registration and opening the next one
     * (via the Cohorts resource) is what separates applicants into their
     * own tab here; nothing to configure on this page itself.
     */
    public function getTabs(): array
    {
        $tabs = ['all' => Tab::make('All')];

        foreach (AcademyCohort::orderByDesc('created_at')->get() as $cohort) {
            $label = $cohort->name.($cohort->status === 'open' ? ' (Open)' : '');

            $tabs[$cohort->id] = Tab::make($label)
                ->modifyQueryUsing(fn ($query) => $query->where('academy_cohort_id', $cohort->id));
        }

        return $tabs;
    }

    protected function exportCsv()
    {
        $fieldKeys = AcademyFormField::ordered()
            ->pluck('label', 'key')
            ->except(['full_name', 'email', 'program']);

        $filename = 'academy-applicants-'.now()->format('Y-m-d').'.csv';

        return response()->streamDownload(function () use ($fieldKeys) {
            $handle = fopen('php://output', 'w');

            fputcsv($handle, ['Name', 'Email', 'Program', ...$fieldKeys->values()->all(), 'Submitted At']);

            AcademyFormSubmission::orderByDesc('created_at')->each(function (AcademyFormSubmission $submission) use ($handle, $fieldKeys) {
                $answers = $submission->answers ?? [];

                fputcsv($handle, [
                    $submission->full_name,
                    $submission->email,
                    $submission->program,
                    ...$fieldKeys->keys()->map(fn ($key) => $answers[$key] ?? '')->all(),
                    $submission->submitted_at?->toDateTimeString(),
                ]);
            });

            fclose($handle);
        }, $filename, ['Content-Type' => 'text/csv']);
    }
}
