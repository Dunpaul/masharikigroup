<?php

namespace App\Filament\Resources\FestivalNewsArticles\Pages;

use App\Filament\Resources\FestivalNewsArticles\FestivalNewsArticleResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFestivalNewsArticles extends ListRecords
{
    protected static string $resource = FestivalNewsArticleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
