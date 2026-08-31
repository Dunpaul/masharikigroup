<?php

namespace App\Filament\Resources\FestivalGuests\Pages;

use App\Filament\Resources\FestivalGuests\FestivalGuestResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFestivalGuest extends EditRecord
{
    protected static string $resource = FestivalGuestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
