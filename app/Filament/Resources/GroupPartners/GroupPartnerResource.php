<?php

namespace App\Filament\Resources\GroupPartners;

use App\Filament\Resources\GroupPartners\Pages\CreateGroupPartner;
use App\Filament\Resources\GroupPartners\Pages\EditGroupPartner;
use App\Filament\Resources\GroupPartners\Pages\ListGroupPartners;
use App\Filament\Resources\GroupPartners\Schemas\GroupPartnerForm;
use App\Filament\Resources\GroupPartners\Tables\GroupPartnersTable;
use App\Models\GroupPartner;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class GroupPartnerResource extends Resource
{
    protected static ?string $model = GroupPartner::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|\UnitEnum|null $navigationGroup = 'Mashariki Group';

    protected static ?string $navigationLabel = 'Partners';

    public static function form(Schema $schema): Schema
    {
        return GroupPartnerForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GroupPartnersTable::configure($table);
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
            'index' => ListGroupPartners::route('/'),
            'create' => CreateGroupPartner::route('/create'),
            'edit' => EditGroupPartner::route('/{record}/edit'),
        ];
    }
}
