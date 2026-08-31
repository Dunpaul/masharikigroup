<?php

namespace App\Filament\Resources\GroupPartners\Pages;

use App\Filament\Resources\GroupPartners\GroupPartnerResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditGroupPartner extends EditRecord
{
    protected static string $resource = GroupPartnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
