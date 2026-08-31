<?php

namespace App\Filament\Resources\AcademyCohorts\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AcademyCohortForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->placeholder('e.g. "2026 Intake" or "Cohort 5"'),
                Select::make('status')
                    ->required()
                    ->options([
                        'open' => 'Open — accepting applications',
                        'closed' => 'Closed',
                    ])
                    ->default('open')
                    ->helperText('Setting this to Open automatically closes any other currently-open cohort.'),
            ]);
    }
}
