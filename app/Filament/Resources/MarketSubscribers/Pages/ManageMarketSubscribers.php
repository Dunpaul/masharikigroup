<?php

namespace App\Filament\Resources\MarketSubscribers\Pages;

use App\Filament\Resources\MarketSubscribers\MarketSubscriberResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageMarketSubscribers extends ManageRecords
{
    protected static string $resource = MarketSubscriberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
