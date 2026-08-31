<?php

namespace App\Filament\Resources\MarketCategories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class MarketCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')->required(),
                Textarea::make('description')->required()->rows(4),
                TextInput::make('cta_label')->default('Register')->required(),
                TextInput::make('cta_url')->url()->nullable(),
                TextInput::make('sort_order')->numeric()->default(0),
            ]);
    }
}
