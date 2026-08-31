<?php

namespace App\Filament\Resources\FestivalVenues\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FestivalVenueForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Venue')
                    ->columns(2)
                    ->components([
                        TextInput::make('name')->required()->columnSpanFull(),
                        TextInput::make('address'),
                        TextInput::make('capacity')->numeric(),
                        TextInput::make('latitude')->numeric(),
                        TextInput::make('longitude')->numeric(),
                        FileUpload::make('photo')->image()->directory('festival/venues'),
                    ]),
                Section::make('Visitor Info')
                    ->components([
                        Textarea::make('accessibility_info')->rows(3),
                        Textarea::make('transport_notes')->rows(3),
                    ]),
                TextInput::make('sort_order')->numeric()->default(0),
            ]);
    }
}
