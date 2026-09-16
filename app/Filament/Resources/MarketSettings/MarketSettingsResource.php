<?php

namespace App\Filament\Resources\MarketSettings;

use App\Filament\Resources\MarketSettings\Pages\ManageMarketSettings;
use App\Models\MarketSettings;
use BackedEnum;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MarketSettingsResource extends Resource
{
    protected static ?string $model = MarketSettings::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static string|\UnitEnum|null $navigationGroup = 'Masharket';

    protected static ?string $navigationLabel = 'Event Settings';

    protected static ?string $modelLabel = 'Event Settings';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Event')
                    ->columns(2)
                    ->components([
                        TextInput::make('event_name')->required()->columnSpanFull(),
                        TextInput::make('theme'),
                        DatePicker::make('start_date')->native(false),
                        DatePicker::make('end_date')->native(false),
                        TextInput::make('venue_name'),
                        TextInput::make('venue_address'),
                        TextInput::make('map_embed_url')->columnSpanFull()->helperText('Google Maps embed src URL'),
                    ]),
                Section::make('Intro copy')
                    ->components([
                        Textarea::make('intro_paragraph_1')->rows(4),
                        Textarea::make('intro_paragraph_2')->rows(4),
                    ]),
                Section::make('Contact')
                    ->columns(3)
                    ->components([
                        TextInput::make('contact_phone_1'),
                        TextInput::make('contact_phone_2'),
                        TextInput::make('contact_email')->email(),
                    ]),
                Section::make('Socials')
                    ->components([
                        KeyValue::make('socials')
                            ->keyLabel('Network')
                            ->valueLabel('URL')
                            ->helperText('e.g. linkedin, instagram, whatsapp, tiktok, youtube, facebook'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('event_name'),
                TextColumn::make('start_date')->date(),
                TextColumn::make('end_date')->date(),
                TextColumn::make('venue_name'),
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
            'index' => ManageMarketSettings::route('/'),
        ];
    }
}
