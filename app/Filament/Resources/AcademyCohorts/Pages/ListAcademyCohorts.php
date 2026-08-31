<?php

namespace App\Filament\Resources\AcademyCohorts\Pages;

use App\Filament\Resources\AcademyCohorts\AcademyCohortResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAcademyCohorts extends ListRecords
{
    protected static string $resource = AcademyCohortResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->label('New Cohort'),
        ];
    }
}
