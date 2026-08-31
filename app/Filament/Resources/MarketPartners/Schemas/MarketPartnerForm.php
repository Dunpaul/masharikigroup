<?php

namespace App\Filament\Resources\MarketPartners\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class MarketPartnerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->required(),
                FileUpload::make('logo_path')
                    ->label('Logo')
                    ->image()
                    ->directory('market/partners')
                    ->required(),
                TextInput::make('url')
                    ->label('Website URL')
                    ->url()
                    ->helperText('Optional — the logo will link here on the Partners page.'),
                Toggle::make('featured')
                    ->label('Feature on homepage')
                    ->helperText('Turn on to show this partner in the featured strip on the homepage.'),
                TextInput::make('sort_order')->numeric()->default(0),
            ]);
    }
}
