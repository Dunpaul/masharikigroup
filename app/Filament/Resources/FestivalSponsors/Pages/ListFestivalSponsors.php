<?php

namespace App\Filament\Resources\FestivalSponsors\Pages;

use App\Filament\Resources\FestivalSponsors\FestivalSponsorResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFestivalSponsors extends ListRecords
{
    protected static string $resource = FestivalSponsorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
