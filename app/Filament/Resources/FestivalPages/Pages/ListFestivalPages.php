<?php

namespace App\Filament\Resources\FestivalPages\Pages;

use App\Filament\Resources\FestivalPages\FestivalPageResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFestivalPages extends ListRecords
{
    protected static string $resource = FestivalPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
