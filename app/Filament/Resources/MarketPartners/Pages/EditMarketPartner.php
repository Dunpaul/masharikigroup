<?php

namespace App\Filament\Resources\MarketPartners\Pages;

use App\Filament\Resources\MarketPartners\MarketPartnerResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMarketPartner extends EditRecord
{
    protected static string $resource = MarketPartnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
