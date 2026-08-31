<?php

namespace App\Filament\Resources\NonExhibitors\Pages;

use App\Filament\Resources\NonExhibitors\NonExhibitorResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListNonExhibitors extends ListRecords
{
    protected static string $resource = NonExhibitorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
