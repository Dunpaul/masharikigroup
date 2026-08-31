<?php

namespace App\Filament\Resources\MarketNewsArticles\Pages;

use App\Filament\Resources\MarketNewsArticles\MarketNewsArticleResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMarketNewsArticles extends ListRecords
{
    protected static string $resource = MarketNewsArticleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
