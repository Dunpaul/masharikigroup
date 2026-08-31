<?php

namespace App\Filament\Resources\FestivalFilms\Pages;

use App\Filament\Resources\FestivalFilms\FestivalFilmResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFestivalFilm extends EditRecord
{
    protected static string $resource = FestivalFilmResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
