<?php

namespace App\Filament\Resources\FestivalVenues\Pages;

use App\Filament\Resources\FestivalVenues\FestivalVenueResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFestivalVenue extends EditRecord
{
    protected static string $resource = FestivalVenueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
