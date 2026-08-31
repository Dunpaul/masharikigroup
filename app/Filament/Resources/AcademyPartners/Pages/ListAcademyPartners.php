<?php

namespace App\Filament\Resources\AcademyPartners\Pages;

use App\Filament\Resources\AcademyPartners\AcademyPartnerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAcademyPartners extends ListRecords
{
    protected static string $resource = AcademyPartnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
