<?php

namespace App\Filament\Resources\FestivalVenues\Pages;

use App\Filament\Resources\FestivalVenues\FestivalVenueResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFestivalVenues extends ListRecords
{
    protected static string $resource = FestivalVenueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
