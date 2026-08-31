<?php

namespace App\Filament\Resources\MarketCategories;

use App\Filament\Resources\MarketCategories\Pages\CreateMarketCategory;
use App\Filament\Resources\MarketCategories\Pages\EditMarketCategory;
use App\Filament\Resources\MarketCategories\Pages\ListMarketCategories;
use App\Filament\Resources\MarketCategories\Schemas\MarketCategoryForm;
use App\Filament\Resources\MarketCategories\Tables\MarketCategoriesTable;
use App\Models\MarketCategory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MarketCategoryResource extends Resource
{
    protected static ?string $model = MarketCategory::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|\UnitEnum|null $navigationGroup = 'Masharket';

    protected static ?string $navigationLabel = 'Registration Categories';

    public static function form(Schema $schema): Schema
    {
        return MarketCategoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MarketCategoriesTable::configure($table);
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
            'index' => ListMarketCategories::route('/'),
            'create' => CreateMarketCategory::route('/create'),
            'edit' => EditMarketCategory::route('/{record}/edit'),
        ];
    }
}
