<?php

namespace App\Filament\Resources\FestivalSettings\Pages;

use App\Filament\Resources\FestivalSettings\FestivalSettingsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageFestivalSettings extends ManageRecords
{
    protected static string $resource = FestivalSettingsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
