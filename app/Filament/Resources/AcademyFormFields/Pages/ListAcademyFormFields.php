<?php

namespace App\Filament\Resources\AcademyFormFields\Pages;

use App\Filament\Resources\AcademyFormFields\AcademyFormFieldResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAcademyFormFields extends ListRecords
{
    protected static string $resource = AcademyFormFieldResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
