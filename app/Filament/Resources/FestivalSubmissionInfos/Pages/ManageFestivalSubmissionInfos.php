<?php

namespace App\Filament\Resources\FestivalSubmissionInfos\Pages;

use App\Filament\Resources\FestivalSubmissionInfos\FestivalSubmissionInfoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageFestivalSubmissionInfos extends ManageRecords
{
    protected static string $resource = FestivalSubmissionInfoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
