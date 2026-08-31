<?php

namespace App\Filament\Resources\FestivalSections\Pages;

use App\Filament\Resources\FestivalSections\FestivalSectionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFestivalSections extends ListRecords
{
    protected static string $resource = FestivalSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
