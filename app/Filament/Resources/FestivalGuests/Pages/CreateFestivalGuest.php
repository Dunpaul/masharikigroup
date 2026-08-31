<?php

namespace App\Filament\Resources\FestivalGuests\Pages;

use App\Filament\Resources\FestivalGuests\FestivalGuestResource;
use Filament\Resources\Pages\CreateRecord;

class CreateFestivalGuest extends CreateRecord
{
    protected static string $resource = FestivalGuestResource::class;
}
