<?php

namespace App\Filament\Resources\FestivalGuests\Pages;

use App\Filament\Resources\FestivalGuests\FestivalGuestResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFestivalGuests extends ListRecords
{
    protected static string $resource = FestivalGuestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
