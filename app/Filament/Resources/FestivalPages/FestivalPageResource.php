<?php

namespace App\Filament\Resources\FestivalPages;

use App\Filament\Resources\FestivalPages\Pages\CreateFestivalPage;
use App\Filament\Resources\FestivalPages\Pages\EditFestivalPage;
use App\Filament\Resources\FestivalPages\Pages\ListFestivalPages;
use App\Filament\Resources\FestivalPages\Schemas\FestivalPageForm;
use App\Filament\Resources\FestivalPages\Tables\FestivalPagesTable;
use App\Models\FestivalPage;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FestivalPageResource extends Resource
{
    protected static ?string $model = FestivalPage::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|\UnitEnum|null $navigationGroup = 'Festival';

    public static function form(Schema $schema): Schema
    {
        return FestivalPageForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FestivalPagesTable::configure($table);
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
            'index' => ListFestivalPages::route('/'),
            'create' => CreateFestivalPage::route('/create'),
            'edit' => EditFestivalPage::route('/{record}/edit'),
        ];
    }
}
