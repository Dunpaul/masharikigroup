<?php

namespace App\Filament\Resources\NonExhibitors;

use App\Filament\Resources\NonExhibitors\Pages\EditNonExhibitor;
use App\Filament\Resources\NonExhibitors\Pages\ListNonExhibitors;
use App\Filament\Resources\NonExhibitors\Pages\ViewNonExhibitor;
use App\Filament\Resources\NonExhibitors\Schemas\NonExhibitorForm;
use App\Filament\Resources\NonExhibitors\Schemas\NonExhibitorInfolist;
use App\Filament\Resources\NonExhibitors\Tables\NonExhibitorsTable;
use App\Models\NonExhibitor;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class NonExhibitorResource extends Resource
{
    protected static ?string $model = NonExhibitor::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|\UnitEnum|null $navigationGroup = 'Masharket';

    protected static ?string $recordTitleAttribute = 'company_name';

    public static function form(Schema $schema): Schema
    {
        return NonExhibitorForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return NonExhibitorInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return NonExhibitorsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => ListNonExhibitors::route('/'),
            'view' => ViewNonExhibitor::route('/{record}'),
            'edit' => EditNonExhibitor::route('/{record}/edit'),
        ];
    }
}
