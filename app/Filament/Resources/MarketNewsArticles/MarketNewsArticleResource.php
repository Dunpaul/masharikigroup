<?php

namespace App\Filament\Resources\MarketNewsArticles;

use App\Filament\Resources\MarketNewsArticles\Pages\CreateMarketNewsArticle;
use App\Filament\Resources\MarketNewsArticles\Pages\EditMarketNewsArticle;
use App\Filament\Resources\MarketNewsArticles\Pages\ListMarketNewsArticles;
use App\Filament\Resources\MarketNewsArticles\Schemas\MarketNewsArticleForm;
use App\Filament\Resources\MarketNewsArticles\Tables\MarketNewsArticlesTable;
use App\Models\MarketNewsArticle;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MarketNewsArticleResource extends Resource
{
    protected static ?string $model = MarketNewsArticle::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|\UnitEnum|null $navigationGroup = 'Masharket';

    protected static ?string $navigationLabel = 'News & Press';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return MarketNewsArticleForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MarketNewsArticlesTable::configure($table);
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
            'index' => ListMarketNewsArticles::route('/'),
            'create' => CreateMarketNewsArticle::route('/create'),
            'edit' => EditMarketNewsArticle::route('/{record}/edit'),
        ];
    }
}
