<?php

namespace App\Filament\Resources\FestivalAwards\Pages;

use App\Filament\Resources\FestivalAwards\FestivalAwardResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFestivalAwards extends ListRecords
{
    protected static string $resource = FestivalAwardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
