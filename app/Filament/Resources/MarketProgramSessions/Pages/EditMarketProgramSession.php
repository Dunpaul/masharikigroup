<?php

namespace App\Filament\Resources\MarketProgramSessions\Pages;

use App\Filament\Resources\MarketProgramSessions\MarketProgramSessionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMarketProgramSession extends EditRecord
{
    protected static string $resource = MarketProgramSessionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
