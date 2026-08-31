<?php

namespace App\Filament\Resources\FestivalPartners\Pages;

use App\Filament\Resources\FestivalPartners\FestivalPartnerResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFestivalPartner extends EditRecord
{
    protected static string $resource = FestivalPartnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
