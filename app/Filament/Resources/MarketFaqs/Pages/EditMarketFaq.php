<?php

namespace App\Filament\Resources\MarketFaqs\Pages;

use App\Filament\Resources\MarketFaqs\MarketFaqResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMarketFaq extends EditRecord
{
    protected static string $resource = MarketFaqResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
