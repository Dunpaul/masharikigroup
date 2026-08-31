<?php

namespace App\Filament\Resources\VirtualAttendants\Pages;

use App\Filament\Resources\VirtualAttendants\VirtualAttendantResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditVirtualAttendant extends EditRecord
{
    protected static string $resource = VirtualAttendantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
