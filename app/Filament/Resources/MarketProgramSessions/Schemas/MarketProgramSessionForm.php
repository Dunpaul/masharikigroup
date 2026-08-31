<?php

namespace App\Filament\Resources\MarketProgramSessions\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class MarketProgramSessionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('day_number')->required()->options([
                    1 => 'Day 1',
                    2 => 'Day 2',
                    3 => 'Day 3',
                ]),
                TextInput::make('time_label')->required()->placeholder('e.g. 9:00 AM TO 10:00 AM'),
                TextInput::make('title')->required(),
                Textarea::make('description')->rows(3),
                TextInput::make('sort_order')->numeric()->default(0),
            ]);
    }
}
