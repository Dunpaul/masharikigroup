<?php

namespace App\Filament\Resources\MarketPartners\Pages;

use App\Filament\Resources\MarketPartners\MarketPartnerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMarketPartners extends ListRecords
{
    protected static string $resource = MarketPartnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
