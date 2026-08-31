<?php

namespace App\Filament\Resources\MarketFaqs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class MarketFaqForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('question')->required()->columnSpanFull(),
                Textarea::make('answer')->required()->rows(4)->columnSpanFull(),
                TextInput::make('sort_order')->numeric()->default(0),
            ]);
    }
}
