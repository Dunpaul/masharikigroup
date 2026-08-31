<?php

namespace App\Filament\Resources\FestivalVenues;

use App\Filament\Resources\FestivalVenues\Pages\CreateFestivalVenue;
use App\Filament\Resources\FestivalVenues\Pages\EditFestivalVenue;
use App\Filament\Resources\FestivalVenues\Pages\ListFestivalVenues;
use App\Filament\Resources\FestivalVenues\Schemas\FestivalVenueForm;
use App\Filament\Resources\FestivalVenues\Tables\FestivalVenuesTable;
use App\Models\FestivalVenue;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FestivalVenueResource extends Resource
{
    protected static ?string $model = FestivalVenue::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|\UnitEnum|null $navigationGroup = 'Festival';

    public static function form(Schema $schema): Schema
    {
        return FestivalVenueForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FestivalVenuesTable::configure($table);
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
            'index' => ListFestivalVenues::route('/'),
            'create' => CreateFestivalVenue::route('/create'),
            'edit' => EditFestivalVenue::route('/{record}/edit'),
        ];
    }
}
