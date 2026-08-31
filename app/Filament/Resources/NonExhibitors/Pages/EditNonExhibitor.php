<?php

namespace App\Filament\Resources\NonExhibitors\Pages;

use App\Filament\Resources\NonExhibitors\NonExhibitorResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditNonExhibitor extends EditRecord
{
    protected static string $resource = NonExhibitorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
