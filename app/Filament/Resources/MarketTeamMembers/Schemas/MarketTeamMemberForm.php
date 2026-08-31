<?php

namespace App\Filament\Resources\MarketTeamMembers\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MarketTeamMemberForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->required(),
                TextInput::make('role')->required(),
                FileUpload::make('photo_path')
                    ->label('Photo')
                    ->image()
                    ->directory('market/team'),
                TextInput::make('sort_order')->numeric()->default(0),
            ]);
    }
}
