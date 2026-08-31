<?php

namespace App\Filament\Resources\FestivalSponsors;

use App\Filament\Resources\FestivalSponsors\Pages\CreateFestivalSponsor;
use App\Filament\Resources\FestivalSponsors\Pages\EditFestivalSponsor;
use App\Filament\Resources\FestivalSponsors\Pages\ListFestivalSponsors;
use App\Filament\Resources\FestivalSponsors\Schemas\FestivalSponsorForm;
use App\Filament\Resources\FestivalSponsors\Tables\FestivalSponsorsTable;
use App\Models\FestivalSponsor;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FestivalSponsorResource extends Resource
{
    protected static ?string $model = FestivalSponsor::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|\UnitEnum|null $navigationGroup = 'Festival';

    public static function form(Schema $schema): Schema
    {
        return FestivalSponsorForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FestivalSponsorsTable::configure($table);
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
            'index' => ListFestivalSponsors::route('/'),
            'create' => CreateFestivalSponsor::route('/create'),
            'edit' => EditFestivalSponsor::route('/{record}/edit'),
        ];
    }
}
