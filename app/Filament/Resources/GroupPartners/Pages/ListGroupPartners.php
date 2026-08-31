<?php

namespace App\Filament\Resources\GroupPartners\Pages;

use App\Filament\Resources\GroupPartners\GroupPartnerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListGroupPartners extends ListRecords
{
    protected static string $resource = GroupPartnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
