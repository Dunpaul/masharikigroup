<?php

namespace App\Filament\Resources\FestivalSponsors\Pages;

use App\Filament\Resources\FestivalSponsors\FestivalSponsorResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFestivalSponsor extends EditRecord
{
    protected static string $resource = FestivalSponsorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
