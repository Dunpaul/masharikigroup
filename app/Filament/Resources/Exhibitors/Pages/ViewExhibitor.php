<?php

namespace App\Filament\Resources\Exhibitors\Pages;

use App\Filament\Resources\Exhibitors\ExhibitorResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewExhibitor extends ViewRecord
{
    protected static string $resource = ExhibitorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
