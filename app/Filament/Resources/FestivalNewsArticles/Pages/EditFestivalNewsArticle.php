<?php

namespace App\Filament\Resources\FestivalNewsArticles\Pages;

use App\Filament\Resources\FestivalNewsArticles\FestivalNewsArticleResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFestivalNewsArticle extends EditRecord
{
    protected static string $resource = FestivalNewsArticleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
