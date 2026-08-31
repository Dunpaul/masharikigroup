<?php

namespace App\Filament\Resources\MarketProgramSessions;

use App\Filament\Resources\MarketProgramSessions\Pages\CreateMarketProgramSession;
use App\Filament\Resources\MarketProgramSessions\Pages\EditMarketProgramSession;
use App\Filament\Resources\MarketProgramSessions\Pages\ListMarketProgramSessions;
use App\Filament\Resources\MarketProgramSessions\Schemas\MarketProgramSessionForm;
use App\Filament\Resources\MarketProgramSessions\Tables\MarketProgramSessionsTable;
use App\Models\MarketProgramSession;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MarketProgramSessionResource extends Resource
{
    protected static ?string $model = MarketProgramSession::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|\UnitEnum|null $navigationGroup = 'Masharket';

    protected static ?string $navigationLabel = 'Program Sessions';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return MarketProgramSessionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MarketProgramSessionsTable::configure($table);
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
            'index' => ListMarketProgramSessions::route('/'),
            'create' => CreateMarketProgramSession::route('/create'),
            'edit' => EditMarketProgramSession::route('/{record}/edit'),
        ];
    }
}
