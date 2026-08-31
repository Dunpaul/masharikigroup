<?php

namespace App\Filament\Resources\MarketPartners;

use App\Filament\Resources\MarketPartners\Pages\CreateMarketPartner;
use App\Filament\Resources\MarketPartners\Pages\EditMarketPartner;
use App\Filament\Resources\MarketPartners\Pages\ListMarketPartners;
use App\Filament\Resources\MarketPartners\Schemas\MarketPartnerForm;
use App\Filament\Resources\MarketPartners\Tables\MarketPartnersTable;
use App\Models\MarketPartner;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MarketPartnerResource extends Resource
{
    protected static ?string $model = MarketPartner::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|\UnitEnum|null $navigationGroup = 'Masharket';

    public static function form(Schema $schema): Schema
    {
        return MarketPartnerForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MarketPartnersTable::configure($table);
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
            'index' => ListMarketPartners::route('/'),
            'create' => CreateMarketPartner::route('/create'),
            'edit' => EditMarketPartner::route('/{record}/edit'),
        ];
    }
}
