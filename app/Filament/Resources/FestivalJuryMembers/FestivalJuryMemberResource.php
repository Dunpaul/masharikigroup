<?php

namespace App\Filament\Resources\FestivalJuryMembers;

use App\Filament\Resources\FestivalJuryMembers\Pages\CreateFestivalJuryMember;
use App\Filament\Resources\FestivalJuryMembers\Pages\EditFestivalJuryMember;
use App\Filament\Resources\FestivalJuryMembers\Pages\ListFestivalJuryMembers;
use App\Filament\Resources\FestivalJuryMembers\Schemas\FestivalJuryMemberForm;
use App\Filament\Resources\FestivalJuryMembers\Tables\FestivalJuryMembersTable;
use App\Models\FestivalJuryMember;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FestivalJuryMemberResource extends Resource
{
    protected static ?string $model = FestivalJuryMember::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|\UnitEnum|null $navigationGroup = 'Festival';

    public static function form(Schema $schema): Schema
    {
        return FestivalJuryMemberForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FestivalJuryMembersTable::configure($table);
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
            'index' => ListFestivalJuryMembers::route('/'),
            'create' => CreateFestivalJuryMember::route('/create'),
            'edit' => EditFestivalJuryMember::route('/{record}/edit'),
        ];
    }
}
