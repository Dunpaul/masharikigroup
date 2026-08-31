<?php

namespace App\Filament\Resources\MarketTeamMembers\Pages;

use App\Filament\Resources\MarketTeamMembers\MarketTeamMemberResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMarketTeamMembers extends ListRecords
{
    protected static string $resource = MarketTeamMemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
