<?php

namespace App\Filament\Resources\VirtualAttendants\Pages;

use App\Filament\Resources\VirtualAttendants\VirtualAttendantResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListVirtualAttendants extends ListRecords
{
    protected static string $resource = VirtualAttendantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
