<?php

namespace App\Filament\Resources\FestivalSections;

use App\Filament\Resources\FestivalSections\Pages\CreateFestivalSection;
use App\Filament\Resources\FestivalSections\Pages\EditFestivalSection;
use App\Filament\Resources\FestivalSections\Pages\ListFestivalSections;
use App\Filament\Resources\FestivalSections\Schemas\FestivalSectionForm;
use App\Filament\Resources\FestivalSections\Tables\FestivalSectionsTable;
use App\Models\FestivalSection;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FestivalSectionResource extends Resource
{
    protected static ?string $model = FestivalSection::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|\UnitEnum|null $navigationGroup = 'Festival';

    public static function form(Schema $schema): Schema
    {
        return FestivalSectionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FestivalSectionsTable::configure($table);
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
            'index' => ListFestivalSections::route('/'),
            'create' => CreateFestivalSection::route('/create'),
            'edit' => EditFestivalSection::route('/{record}/edit'),
        ];
    }
}
