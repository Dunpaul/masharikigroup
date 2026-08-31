<?php

namespace App\Filament\Resources\MarketCategories\Pages;

use App\Filament\Resources\MarketCategories\MarketCategoryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMarketCategory extends EditRecord
{
    protected static string $resource = MarketCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
