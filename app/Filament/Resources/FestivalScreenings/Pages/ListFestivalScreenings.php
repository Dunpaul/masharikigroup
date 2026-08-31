<?php

namespace App\Filament\Resources\FestivalScreenings\Pages;

use App\Filament\Resources\FestivalScreenings\FestivalScreeningResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFestivalScreenings extends ListRecords
{
    protected static string $resource = FestivalScreeningResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
