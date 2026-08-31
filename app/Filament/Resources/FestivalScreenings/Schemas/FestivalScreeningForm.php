<?php

namespace App\Filament\Resources\FestivalScreenings\Schemas;

use App\Models\FestivalFilm;
use App\Models\FestivalVenue;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class FestivalScreeningForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('festival_film_id')
                    ->label('Film')
                    ->options(fn () => FestivalFilm::pluck('title', 'id'))
                    ->searchable()
                    ->required(),
                Select::make('festival_venue_id')
                    ->label('Venue')
                    ->options(fn () => FestivalVenue::pluck('name', 'id'))
                    ->required(),
                TextInput::make('hall'),
                DatePicker::make('screening_date')->required()->native(false),
                TextInput::make('start_time')->type('time')->required(),
                TextInput::make('end_time')->type('time'),
                TextInput::make('ticket_url')->url(),
                Toggle::make('sold_out'),
                Toggle::make('has_qna')->label('Q&A / Guest Present'),
            ]);
    }
}
