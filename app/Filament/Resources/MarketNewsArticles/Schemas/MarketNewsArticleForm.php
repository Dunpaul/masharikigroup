<?php

namespace App\Filament\Resources\MarketNewsArticles\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class MarketNewsArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')->required()->live(onBlur: true)
                    ->afterStateUpdated(function (string $context, $state, callable $set) {
                        if ($context === 'create') {
                            $set('slug', Str::slug($state));
                        }
                    }),
                TextInput::make('slug')->required()->unique(ignoreRecord: true),
                FileUpload::make('image_path')->label('Image')->image()->directory('market/news'),
                Textarea::make('excerpt')->required()->rows(2),
                RichEditor::make('body')->required()->columnSpanFull(),
                DatePicker::make('published_at')->native(false),
            ]);
    }
}
