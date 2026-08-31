<?php

namespace App\Filament\Resources\VirtualAttendants\Pages;

use App\Filament\Resources\VirtualAttendants\VirtualAttendantResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewVirtualAttendant extends ViewRecord
{
    protected static string $resource = VirtualAttendantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
