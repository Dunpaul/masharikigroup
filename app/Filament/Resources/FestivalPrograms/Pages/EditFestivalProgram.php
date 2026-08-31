<?php

namespace App\Filament\Resources\FestivalPrograms\Pages;

use App\Filament\Resources\FestivalPrograms\FestivalProgramResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFestivalProgram extends EditRecord
{
    protected static string $resource = FestivalProgramResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
