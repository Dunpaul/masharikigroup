<?php

namespace App\Filament\Resources\MarketCategories\Pages;

use App\Filament\Resources\MarketCategories\MarketCategoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMarketCategories extends ListRecords
{
    protected static string $resource = MarketCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
