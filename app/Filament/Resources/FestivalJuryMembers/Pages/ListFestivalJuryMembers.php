<?php

namespace App\Filament\Resources\FestivalJuryMembers\Pages;

use App\Filament\Resources\FestivalJuryMembers\FestivalJuryMemberResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFestivalJuryMembers extends ListRecords
{
    protected static string $resource = FestivalJuryMemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
