<?php

namespace App\Filament\Resources\FestivalPartners\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class FestivalPartnerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->required(),
                FileUpload::make('logo_path')
                    ->label('Logo')
                    ->image()
                    ->directory('festival/partners')
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
