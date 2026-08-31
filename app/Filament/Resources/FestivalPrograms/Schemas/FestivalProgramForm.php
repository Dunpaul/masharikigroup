<?php

namespace App\Filament\Resources\FestivalPrograms\Schemas;

use App\Models\FestivalEdition;
use App\Models\FestivalGuest;
use App\Models\FestivalVenue;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class FestivalProgramForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('festival_edition_id')
                    ->label('Edition')
                    ->options(fn () => FestivalEdition::query()->orderByDesc('year')->pluck('year', 'id'))
                    ->required()
                    ->live(),
                TextInput::make('title')->required(),
                Select::make('type')->required()->options([
                    'panel' => 'Panel',
                    'masterclass' => 'Masterclass',
                    'workshop' => 'Workshop',
                    'ceremony' => 'Ceremony',
                ]),
                Select::make('festival_venue_id')
                    ->label('Venue')
                    ->options(fn () => FestivalVenue::pluck('name', 'id')),
                Textarea::make('description')->rows(3),
                DatePicker::make('event_date')->native(false),
                TextInput::make('start_time')->type('time'),
                TextInput::make('end_time')->type('time'),
                Select::make('speakers')
                    ->relationship('speakers', 'name')
                    ->multiple()
                    ->options(fn (callable $get) => FestivalGuest::where('festival_edition_id', $get('festival_edition_id'))->pluck('name', 'id')),
                TextInput::make('sort_order')->numeric()->default(0),
            ]);
    }
}
