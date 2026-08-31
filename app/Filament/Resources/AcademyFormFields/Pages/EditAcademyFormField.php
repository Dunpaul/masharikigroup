<?php

namespace App\Filament\Resources\AcademyFormFields\Pages;

use App\Filament\Resources\AcademyFormFields\AcademyFormFieldResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAcademyFormField extends EditRecord
{
    protected static string $resource = AcademyFormFieldResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->hidden(fn () => filled($this->record->system_key)),
        ];
    }
}
