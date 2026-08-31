<?php

namespace App\Filament\Resources\AcademyFormSubmissions;

use App\Filament\Resources\AcademyFormSubmissions\Pages\ListAcademyFormSubmissions;
use App\Filament\Resources\AcademyFormSubmissions\Pages\ViewAcademyFormSubmission;
use App\Filament\Resources\AcademyFormSubmissions\Schemas\AcademyFormSubmissionInfolist;
use App\Filament\Resources\AcademyFormSubmissions\Tables\AcademyFormSubmissionsTable;
use App\Models\AcademyFormSubmission;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AcademyFormSubmissionResource extends Resource
{
    protected static ?string $model = AcademyFormSubmission::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedInbox;

    protected static string|\UnitEnum|null $navigationGroup = 'Mashariki Arts Academy';

    protected static ?string $navigationLabel = 'Applicants';

    protected static ?string $recordTitleAttribute = 'full_name';

    public static function infolist(Schema $schema): Schema
    {
        return AcademyFormSubmissionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AcademyFormSubmissionsTable::configure($table);
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
            'index' => ListAcademyFormSubmissions::route('/'),
            'view' => ViewAcademyFormSubmission::route('/{record}'),
        ];
    }
}
