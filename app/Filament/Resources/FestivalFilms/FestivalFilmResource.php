<?php

namespace App\Filament\Resources\FestivalFilms;

use App\Filament\Resources\FestivalFilms\Pages\CreateFestivalFilm;
use App\Filament\Resources\FestivalFilms\Pages\EditFestivalFilm;
use App\Filament\Resources\FestivalFilms\Pages\ListFestivalFilms;
use App\Filament\Resources\FestivalFilms\Schemas\FestivalFilmForm;
use App\Filament\Resources\FestivalFilms\Tables\FestivalFilmsTable;
use App\Models\FestivalFilm;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FestivalFilmResource extends Resource
{
    protected static ?string $model = FestivalFilm::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|\UnitEnum|null $navigationGroup = 'Festival';

    public static function form(Schema $schema): Schema
    {
        return FestivalFilmForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FestivalFilmsTable::configure($table);
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
            'index' => ListFestivalFilms::route('/'),
            'create' => CreateFestivalFilm::route('/create'),
            'edit' => EditFestivalFilm::route('/{record}/edit'),
        ];
    }
}
