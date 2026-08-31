<?php

namespace App\Filament\Resources\AcademyPartners;

use App\Filament\Resources\AcademyPartners\Pages\CreateAcademyPartner;
use App\Filament\Resources\AcademyPartners\Pages\EditAcademyPartner;
use App\Filament\Resources\AcademyPartners\Pages\ListAcademyPartners;
use App\Filament\Resources\AcademyPartners\Schemas\AcademyPartnerForm;
use App\Filament\Resources\AcademyPartners\Tables\AcademyPartnersTable;
use App\Models\AcademyPartner;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AcademyPartnerResource extends Resource
{
    protected static ?string $model = AcademyPartner::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|\UnitEnum|null $navigationGroup = 'Mashariki Arts Academy';

    protected static ?string $navigationLabel = 'Partners';

    public static function form(Schema $schema): Schema
    {
        return AcademyPartnerForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AcademyPartnersTable::configure($table);
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
            'index' => ListAcademyPartners::route('/'),
            'create' => CreateAcademyPartner::route('/create'),
            'edit' => EditAcademyPartner::route('/{record}/edit'),
        ];
    }
}
