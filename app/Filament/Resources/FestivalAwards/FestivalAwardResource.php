<?php

namespace App\Filament\Resources\FestivalAwards;

use App\Filament\Resources\FestivalAwards\Pages\CreateFestivalAward;
use App\Filament\Resources\FestivalAwards\Pages\EditFestivalAward;
use App\Filament\Resources\FestivalAwards\Pages\ListFestivalAwards;
use App\Filament\Resources\FestivalAwards\Schemas\FestivalAwardForm;
use App\Filament\Resources\FestivalAwards\Tables\FestivalAwardsTable;
use App\Models\FestivalAward;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FestivalAwardResource extends Resource
{
    protected static ?string $model = FestivalAward::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|\UnitEnum|null $navigationGroup = 'Festival';

    public static function form(Schema $schema): Schema
    {
        return FestivalAwardForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FestivalAwardsTable::configure($table);
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
            'index' => ListFestivalAwards::route('/'),
            'create' => CreateFestivalAward::route('/create'),
            'edit' => EditFestivalAward::route('/{record}/edit'),
        ];
    }
}
