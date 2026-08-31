<?php

namespace App\Filament\Resources\FestivalGuests;

use App\Filament\Resources\FestivalGuests\Pages\CreateFestivalGuest;
use App\Filament\Resources\FestivalGuests\Pages\EditFestivalGuest;
use App\Filament\Resources\FestivalGuests\Pages\ListFestivalGuests;
use App\Filament\Resources\FestivalGuests\Schemas\FestivalGuestForm;
use App\Filament\Resources\FestivalGuests\Tables\FestivalGuestsTable;
use App\Models\FestivalGuest;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FestivalGuestResource extends Resource
{
    protected static ?string $model = FestivalGuest::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|\UnitEnum|null $navigationGroup = 'Festival';

    public static function form(Schema $schema): Schema
    {
        return FestivalGuestForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FestivalGuestsTable::configure($table);
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
            'index' => ListFestivalGuests::route('/'),
            'create' => CreateFestivalGuest::route('/create'),
            'edit' => EditFestivalGuest::route('/{record}/edit'),
        ];
    }
}
