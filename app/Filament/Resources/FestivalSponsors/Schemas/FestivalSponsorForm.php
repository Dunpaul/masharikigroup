<?php

namespace App\Filament\Resources\FestivalSponsors\Schemas;

use App\Models\FestivalEdition;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class FestivalSponsorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('festival_edition_id')
                    ->label('Edition')
                    ->options(fn () => FestivalEdition::query()->orderByDesc('year')->pluck('year', 'id'))
                    ->required(),
                TextInput::make('name')->required(),
                Select::make('tier')->required()->options([
                    'title' => 'Title Sponsor',
                    'gold' => 'Gold',
                    'silver' => 'Silver',
                    'partner' => 'Partner',
                ]),
                TextInput::make('website_url')->url(),
                FileUpload::make('logo_path')->label('Logo')->image()->directory('festival/sponsors'),
                TextInput::make('sort_order')->numeric()->default(0),
            ]);
    }
}
