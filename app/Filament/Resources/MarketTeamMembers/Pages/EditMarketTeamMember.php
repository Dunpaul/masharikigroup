<?php

namespace App\Filament\Resources\MarketTeamMembers\Pages;

use App\Filament\Resources\MarketTeamMembers\MarketTeamMemberResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMarketTeamMember extends EditRecord
{
    protected static string $resource = MarketTeamMemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
