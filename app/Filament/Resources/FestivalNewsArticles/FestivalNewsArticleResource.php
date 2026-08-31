<?php

namespace App\Filament\Resources\FestivalNewsArticles;

use App\Filament\Resources\FestivalNewsArticles\Pages\CreateFestivalNewsArticle;
use App\Filament\Resources\FestivalNewsArticles\Pages\EditFestivalNewsArticle;
use App\Filament\Resources\FestivalNewsArticles\Pages\ListFestivalNewsArticles;
use App\Filament\Resources\FestivalNewsArticles\Schemas\FestivalNewsArticleForm;
use App\Filament\Resources\FestivalNewsArticles\Tables\FestivalNewsArticlesTable;
use App\Models\FestivalNewsArticle;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FestivalNewsArticleResource extends Resource
{
    protected static ?string $model = FestivalNewsArticle::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|\UnitEnum|null $navigationGroup = 'Festival';

    public static function form(Schema $schema): Schema
    {
        return FestivalNewsArticleForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FestivalNewsArticlesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFestivalNewsArticles::route('/'),
            'create' => CreateFestivalNewsArticle::route('/create'),
            'edit' => EditFestivalNewsArticle::route('/{record}/edit'),
        ];
    }
}
