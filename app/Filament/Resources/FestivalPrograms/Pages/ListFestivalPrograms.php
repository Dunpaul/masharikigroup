<?php

namespace App\Filament\Resources\FestivalPrograms\Pages;

use App\Filament\Resources\FestivalPrograms\FestivalProgramResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFestivalPrograms extends ListRecords
{
    protected static string $resource = FestivalProgramResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
