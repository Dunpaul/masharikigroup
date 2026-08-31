<?php

namespace App\Filament\Resources\AcademyCohorts;

use App\Filament\Resources\AcademyCohorts\Pages\CreateAcademyCohort;
use App\Filament\Resources\AcademyCohorts\Pages\EditAcademyCohort;
use App\Filament\Resources\AcademyCohorts\Pages\ListAcademyCohorts;
use App\Filament\Resources\AcademyCohorts\Schemas\AcademyCohortForm;
use App\Filament\Resources\AcademyCohorts\Tables\AcademyCohortsTable;
use App\Models\AcademyCohort;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AcademyCohortResource extends Resource
{
    protected static ?string $model = AcademyCohort::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleGroup;

    protected static string|\UnitEnum|null $navigationGroup = 'Mashariki Arts Academy';

    protected static ?string $navigationLabel = 'Cohorts';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return AcademyCohortForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AcademyCohortsTable::configure($table);
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
            'index' => ListAcademyCohorts::route('/'),
            'create' => CreateAcademyCohort::route('/create'),
            'edit' => EditAcademyCohort::route('/{record}/edit'),
        ];
    }
}
