<?php

namespace App\Filament\Resources\FestivalScreenings;

use App\Filament\Resources\FestivalScreenings\Pages\CreateFestivalScreening;
use App\Filament\Resources\FestivalScreenings\Pages\EditFestivalScreening;
use App\Filament\Resources\FestivalScreenings\Pages\ListFestivalScreenings;
use App\Filament\Resources\FestivalScreenings\Schemas\FestivalScreeningForm;
use App\Filament\Resources\FestivalScreenings\Tables\FestivalScreeningsTable;
use App\Models\FestivalScreening;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FestivalScreeningResource extends Resource
{
    protected static ?string $model = FestivalScreening::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|\UnitEnum|null $navigationGroup = 'Festival';

    public static function form(Schema $schema): Schema
    {
        return FestivalScreeningForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FestivalScreeningsTable::configure($table);
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
            'index' => ListFestivalScreenings::route('/'),
            'create' => CreateFestivalScreening::route('/create'),
            'edit' => EditFestivalScreening::route('/{record}/edit'),
        ];
    }
}
