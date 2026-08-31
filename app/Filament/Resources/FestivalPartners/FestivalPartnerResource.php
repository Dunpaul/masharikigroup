<?php

namespace App\Filament\Resources\FestivalPartners;

use App\Filament\Resources\FestivalPartners\Pages\CreateFestivalPartner;
use App\Filament\Resources\FestivalPartners\Pages\EditFestivalPartner;
use App\Filament\Resources\FestivalPartners\Pages\ListFestivalPartners;
use App\Filament\Resources\FestivalPartners\Schemas\FestivalPartnerForm;
use App\Filament\Resources\FestivalPartners\Tables\FestivalPartnersTable;
use App\Models\FestivalPartner;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FestivalPartnerResource extends Resource
{
    protected static ?string $model = FestivalPartner::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|\UnitEnum|null $navigationGroup = 'Festival';

    protected static ?string $navigationLabel = 'Partners';

    public static function form(Schema $schema): Schema
    {
        return FestivalPartnerForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FestivalPartnersTable::configure($table);
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
            'index' => ListFestivalPartners::route('/'),
            'create' => CreateFestivalPartner::route('/create'),
            'edit' => EditFestivalPartner::route('/{record}/edit'),
        ];
    }
}
