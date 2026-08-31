<?php

namespace App\Filament\Resources\MarketSettings\Pages;

use App\Filament\Resources\MarketSettings\MarketSettingsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageMarketSettings extends ManageRecords
{
    protected static string $resource = MarketSettingsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
