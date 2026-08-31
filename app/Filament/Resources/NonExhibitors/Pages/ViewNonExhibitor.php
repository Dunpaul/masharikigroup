<?php

namespace App\Filament\Resources\NonExhibitors\Pages;

use App\Filament\Resources\NonExhibitors\NonExhibitorResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewNonExhibitor extends ViewRecord
{
    protected static string $resource = NonExhibitorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
