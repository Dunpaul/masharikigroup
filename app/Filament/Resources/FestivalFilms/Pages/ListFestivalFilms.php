<?php

namespace App\Filament\Resources\FestivalFilms\Pages;

use App\Filament\Resources\FestivalFilms\FestivalFilmResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFestivalFilms extends ListRecords
{
    protected static string $resource = FestivalFilmResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
