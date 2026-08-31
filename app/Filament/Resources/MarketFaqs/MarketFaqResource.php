<?php

namespace App\Filament\Resources\MarketFaqs;

use App\Filament\Resources\MarketFaqs\Pages\CreateMarketFaq;
use App\Filament\Resources\MarketFaqs\Pages\EditMarketFaq;
use App\Filament\Resources\MarketFaqs\Pages\ListMarketFaqs;
use App\Filament\Resources\MarketFaqs\Schemas\MarketFaqForm;
use App\Filament\Resources\MarketFaqs\Tables\MarketFaqsTable;
use App\Models\MarketFaq;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MarketFaqResource extends Resource
{
    protected static ?string $model = MarketFaq::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|\UnitEnum|null $navigationGroup = 'Masharket';

    protected static ?string $navigationLabel = 'FAQs';

    protected static ?string $recordTitleAttribute = 'question';

    public static function form(Schema $schema): Schema
    {
        return MarketFaqForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MarketFaqsTable::configure($table);
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
            'index' => ListMarketFaqs::route('/'),
            'create' => CreateMarketFaq::route('/create'),
            'edit' => EditMarketFaq::route('/{record}/edit'),
        ];
    }
}
