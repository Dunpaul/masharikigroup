<?php

namespace App\Filament\Resources\AcademyFormSubmissions\Schemas;

use App\Models\AcademyFormField;
use Filament\Infolists\Components\KeyValueEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AcademyFormSubmissionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Applicant')
                    ->columns(4)
                    ->components([
                        TextEntry::make('full_name')->label('Name'),
                        TextEntry::make('email'),
                        TextEntry::make('program')
                            ->formatStateUsing(fn (?string $state) => $state
                                ? (AcademyFormField::where('system_key', 'program')->first()?->resolvedOptions()[$state] ?? $state)
                                : '—'),
                        TextEntry::make('cohort.name')->label('Cohort')->placeholder('—'),
                    ]),
                Section::make('All Answers')
                    ->components([
                        KeyValueEntry::make('answers')
                            ->keyLabel('Field')
                            ->valueLabel('Answer'),
                    ]),
                Section::make('Portfolio Files')
                    ->visible(fn ($record) => filled($record->portfolio_files))
                    ->components([
                        RepeatableEntry::make('portfolio_files')
                            ->schema([
                                TextEntry::make('name'),
                            ]),
                    ]),
                Section::make('Metadata')
                    ->columns(3)
                    ->components([
                        TextEntry::make('submitted_at')->dateTime(),
                        TextEntry::make('ip_address'),
                        TextEntry::make('user_agent')->limit(60),
                    ]),
            ]);
    }
}
