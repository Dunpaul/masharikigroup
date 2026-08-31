<?php

namespace App\Filament\Resources\MarketNewsArticles\Pages;

use App\Filament\Resources\MarketNewsArticles\MarketNewsArticleResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMarketNewsArticle extends EditRecord
{
    protected static string $resource = MarketNewsArticleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
