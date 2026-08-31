<?php

namespace App\Filament\Resources\MarketProgramSessions\Pages;

use App\Filament\Resources\MarketProgramSessions\MarketProgramSessionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMarketProgramSessions extends ListRecords
{
    protected static string $resource = MarketProgramSessionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
