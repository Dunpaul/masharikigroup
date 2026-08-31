<?php

namespace App\Filament\Resources\FestivalAwards\Schemas;

use App\Models\FestivalEdition;
use App\Models\FestivalFilm;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class FestivalAwardForm
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
                TextInput::make('category')->required(),
                Select::make('winner_film_id')
                    ->label('Winning Film (if applicable)')
                    ->options(fn (callable $get) => FestivalFilm::where('festival_edition_id', $get('festival_edition_id'))->pluck('title', 'id')),
                TextInput::make('winner_name')->label('Winner Name (for non-film awards)'),
                TextInput::make('sort_order')->numeric()->default(0),
            ]);
    }
}
