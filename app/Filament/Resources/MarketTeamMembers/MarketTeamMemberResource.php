<?php

namespace App\Filament\Resources\MarketTeamMembers;

use App\Filament\Resources\MarketTeamMembers\Pages\CreateMarketTeamMember;
use App\Filament\Resources\MarketTeamMembers\Pages\EditMarketTeamMember;
use App\Filament\Resources\MarketTeamMembers\Pages\ListMarketTeamMembers;
use App\Filament\Resources\MarketTeamMembers\Schemas\MarketTeamMemberForm;
use App\Filament\Resources\MarketTeamMembers\Tables\MarketTeamMembersTable;
use App\Models\MarketTeamMember;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MarketTeamMemberResource extends Resource
{
    protected static ?string $model = MarketTeamMember::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|\UnitEnum|null $navigationGroup = 'Masharket';

    protected static ?string $navigationLabel = 'Team';

    public static function form(Schema $schema): Schema
    {
        return MarketTeamMemberForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MarketTeamMembersTable::configure($table);
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
            'index' => ListMarketTeamMembers::route('/'),
            'create' => CreateMarketTeamMember::route('/create'),
            'edit' => EditMarketTeamMember::route('/{record}/edit'),
        ];
    }
}
