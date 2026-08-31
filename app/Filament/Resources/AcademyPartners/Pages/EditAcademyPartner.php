<?php

namespace App\Filament\Resources\AcademyPartners\Pages;

use App\Filament\Resources\AcademyPartners\AcademyPartnerResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAcademyPartner extends EditRecord
{
    protected static string $resource = AcademyPartnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
