<?php

namespace App\Filament\Resources\FestivalSections\Pages;

use App\Filament\Resources\FestivalSections\FestivalSectionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFestivalSection extends EditRecord
{
    protected static string $resource = FestivalSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
