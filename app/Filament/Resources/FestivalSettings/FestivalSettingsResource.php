<?php

namespace App\Filament\Resources\FestivalSettings;

use App\Filament\Resources\FestivalSettings\Pages\ManageFestivalSettings;
use App\Models\FestivalSettings;
use BackedEnum;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FestivalSettingsResource extends Resource
{
    protected static ?string $model = FestivalSettings::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static string|\UnitEnum|null $navigationGroup = 'Festival';

    protected static ?string $navigationLabel = 'Settings';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Identity')
                    ->columns(2)
                    ->components([
                        TextInput::make('canonical_name')->required()->columnSpanFull(),
                        TextInput::make('acronym')->required(),
                    ]),
                Section::make('Press')
                    ->components([
                        FileUpload::make('media_kit_path')->label('Media Kit (download)'),
                        Textarea::make('accreditation_info')->rows(3),
                        TextInput::make('press_contact_email')->email(),
                    ]),
                Section::make('Contact')
                    ->columns(2)
                    ->components([
                        TextInput::make('contact_phone'),
                        TextInput::make('contact_email')->email(),
                    ]),
                Section::make('Socials')
                    ->components([
                        KeyValue::make('socials')->keyLabel('Network')->valueLabel('URL'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('canonical_name'),
                TextColumn::make('acronym'),
            ])
            ->recordActions([
                EditAction::make(),
            ]);
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canDeleteAny(): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageFestivalSettings::route('/'),
        ];
    }
}
