<?php

namespace App\Filament\Resources\Applications\Schemas;

use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ApplicationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Applicant')
                    ->columns(2)
                    ->components([
                        TextEntry::make('full_name'),
                        TextEntry::make('email'),
                        TextEntry::make('phone'),
                        TextEntry::make('date_of_birth')->date(),
                        TextEntry::make('nationality'),
                        TextEntry::make('gender'),
                        TextEntry::make('id_number'),
                        TextEntry::make('affiliated_with_norxen')->label('Affiliated with Norsken Kigali'),
                        TextEntry::make('address')->columnSpanFull(),
                    ]),
                Section::make('Program')
                    ->columns(2)
                    ->components([
                        TextEntry::make('specialization')
                            ->formatStateUsing(fn (string $state) => str($state)->replace('_', ' ')->title()),
                        TextEntry::make('education_level'),
                        TextEntry::make('institution'),
                        TextEntry::make('year_completed'),
                        TextEntry::make('has_experience'),
                        TextEntry::make('experience_description')->columnSpanFull(),
                    ]),
                Section::make('Motivation & Declaration')
                    ->components([
                        TextEntry::make('motivation')->columnSpanFull(),
                        TextEntry::make('commitment')->formatStateUsing(fn (bool $state) => $state ? 'Yes' : 'No'),
                        TextEntry::make('declaration_name'),
                        TextEntry::make('declaration_date')->date(),
                        TextEntry::make('declaration_agree')->formatStateUsing(fn (bool $state) => $state ? 'Agreed' : 'Not agreed'),
                    ]),
                Section::make('Portfolio files')
                    ->components([
                        RepeatableEntry::make('portfolio_files')
                            ->schema([
                                TextEntry::make('name'),
                            ])
                            ->contained(false)
                            ->visible(fn ($record) => filled($record->portfolio_files)),
                    ]),
                Section::make('Submission metadata')
                    ->columns(3)
                    ->components([
                        TextEntry::make('ip_address'),
                        TextEntry::make('created_at')->label('Submitted at')->dateTime(),
                    ]),
            ]);
    }
}
