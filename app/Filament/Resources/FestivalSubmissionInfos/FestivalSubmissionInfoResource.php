<?php

namespace App\Filament\Resources\FestivalSubmissionInfos;

use App\Filament\Resources\FestivalSubmissionInfos\Pages\ManageFestivalSubmissionInfos;
use App\Models\FestivalEdition;
use App\Models\FestivalSubmissionInfo;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FestivalSubmissionInfoResource extends Resource
{
    protected static ?string $model = FestivalSubmissionInfo::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|\UnitEnum|null $navigationGroup = 'Festival';

    protected static ?string $navigationLabel = 'Call for Entries';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('festival_edition_id')
                    ->label('Edition')
                    ->options(fn () => FestivalEdition::query()->orderByDesc('year')->pluck('year', 'id'))
                    ->required(),
                Textarea::make('guidelines')->rows(3),
                Textarea::make('categories')->rows(3),
                DatePicker::make('deadline_early')->native(false),
                DatePicker::make('deadline_regular')->native(false),
                DatePicker::make('deadline_late')->native(false),
                Textarea::make('fees')->rows(2),
                TextInput::make('filmfreeway_url')->url(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('edition.year')->label('Edition'),
                TextColumn::make('deadline_regular')->label('Regular Deadline')->date(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageFestivalSubmissionInfos::route('/'),
        ];
    }
}
