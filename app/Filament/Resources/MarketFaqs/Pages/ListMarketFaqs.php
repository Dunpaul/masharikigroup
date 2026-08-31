<?php

namespace App\Filament\Resources\MarketFaqs\Pages;

use App\Filament\Resources\MarketFaqs\MarketFaqResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMarketFaqs extends ListRecords
{
    protected static string $resource = MarketFaqResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
