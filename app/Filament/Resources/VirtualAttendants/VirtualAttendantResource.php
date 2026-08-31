<?php

namespace App\Filament\Resources\VirtualAttendants;

use App\Filament\Resources\VirtualAttendants\Pages\EditVirtualAttendant;
use App\Filament\Resources\VirtualAttendants\Pages\ListVirtualAttendants;
use App\Filament\Resources\VirtualAttendants\Pages\ViewVirtualAttendant;
use App\Filament\Resources\VirtualAttendants\Schemas\VirtualAttendantForm;
use App\Filament\Resources\VirtualAttendants\Schemas\VirtualAttendantInfolist;
use App\Filament\Resources\VirtualAttendants\Tables\VirtualAttendantsTable;
use App\Models\VirtualAttendant;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class VirtualAttendantResource extends Resource
{
    protected static ?string $model = VirtualAttendant::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|\UnitEnum|null $navigationGroup = 'Masharket';

    protected static ?string $recordTitleAttribute = 'company_name';

    public static function form(Schema $schema): Schema
    {
        return VirtualAttendantForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return VirtualAttendantInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VirtualAttendantsTable::configure($table);
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
            'index' => ListVirtualAttendants::route('/'),
            'view' => ViewVirtualAttendant::route('/{record}'),
            'edit' => EditVirtualAttendant::route('/{record}/edit'),
        ];
    }
}
