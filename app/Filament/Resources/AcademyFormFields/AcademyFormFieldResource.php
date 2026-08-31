<?php

namespace App\Filament\Resources\AcademyFormFields;

use App\Filament\Resources\AcademyFormFields\Pages\CreateAcademyFormField;
use App\Filament\Resources\AcademyFormFields\Pages\EditAcademyFormField;
use App\Filament\Resources\AcademyFormFields\Pages\ListAcademyFormFields;
use App\Filament\Resources\AcademyFormFields\Schemas\AcademyFormFieldForm;
use App\Filament\Resources\AcademyFormFields\Tables\AcademyFormFieldsTable;
use App\Models\AcademyFormField;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AcademyFormFieldResource extends Resource
{
    protected static ?string $model = AcademyFormField::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedListBullet;

    protected static string|\UnitEnum|null $navigationGroup = 'Mashariki Arts Academy';

    protected static ?string $navigationLabel = 'Application Form Builder';

    protected static ?string $recordTitleAttribute = 'label';

    public static function form(Schema $schema): Schema
    {
        return AcademyFormFieldForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AcademyFormFieldsTable::configure($table);
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
            'index' => ListAcademyFormFields::route('/'),
            'create' => CreateAcademyFormField::route('/create'),
            'edit' => EditAcademyFormField::route('/{record}/edit'),
        ];
    }
}
