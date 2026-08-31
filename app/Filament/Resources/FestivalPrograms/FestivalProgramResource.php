<?php

namespace App\Filament\Resources\FestivalPrograms;

use App\Filament\Resources\FestivalPrograms\Pages\CreateFestivalProgram;
use App\Filament\Resources\FestivalPrograms\Pages\EditFestivalProgram;
use App\Filament\Resources\FestivalPrograms\Pages\ListFestivalPrograms;
use App\Filament\Resources\FestivalPrograms\Schemas\FestivalProgramForm;
use App\Filament\Resources\FestivalPrograms\Tables\FestivalProgramsTable;
use App\Models\FestivalProgram;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FestivalProgramResource extends Resource
{
    protected static ?string $model = FestivalProgram::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|\UnitEnum|null $navigationGroup = 'Festival';

    public static function form(Schema $schema): Schema
    {
        return FestivalProgramForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FestivalProgramsTable::configure($table);
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
            'index' => ListFestivalPrograms::route('/'),
            'create' => CreateFestivalProgram::route('/create'),
            'edit' => EditFestivalProgram::route('/{record}/edit'),
        ];
    }
}
