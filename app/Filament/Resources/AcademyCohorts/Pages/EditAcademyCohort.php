<?php

namespace App\Filament\Resources\AcademyCohorts\Pages;

use App\Filament\Resources\AcademyCohorts\AcademyCohortResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAcademyCohort extends EditRecord
{
    protected static string $resource = AcademyCohortResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
