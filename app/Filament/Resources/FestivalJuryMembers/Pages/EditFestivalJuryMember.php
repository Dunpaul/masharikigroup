<?php

namespace App\Filament\Resources\FestivalJuryMembers\Pages;

use App\Filament\Resources\FestivalJuryMembers\FestivalJuryMemberResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFestivalJuryMember extends EditRecord
{
    protected static string $resource = FestivalJuryMemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
