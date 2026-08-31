<?php

namespace App\Filament\Resources\FestivalAwards\Pages;

use App\Filament\Resources\FestivalAwards\FestivalAwardResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFestivalAward extends EditRecord
{
    protected static string $resource = FestivalAwardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
