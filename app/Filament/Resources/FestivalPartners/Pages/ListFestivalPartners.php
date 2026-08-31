<?php

namespace App\Filament\Resources\FestivalPartners\Pages;

use App\Filament\Resources\FestivalPartners\FestivalPartnerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFestivalPartners extends ListRecords
{
    protected static string $resource = FestivalPartnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
