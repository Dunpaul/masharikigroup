<?php

namespace App\Filament\Resources\FestivalScreenings\Pages;

use App\Filament\Resources\FestivalScreenings\FestivalScreeningResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFestivalScreening extends EditRecord
{
    protected static string $resource = FestivalScreeningResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
