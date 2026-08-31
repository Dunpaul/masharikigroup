<?php

namespace App\Filament\Resources\FestivalPages\Pages;

use App\Filament\Resources\FestivalPages\FestivalPageResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFestivalPage extends EditRecord
{
    protected static string $resource = FestivalPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
