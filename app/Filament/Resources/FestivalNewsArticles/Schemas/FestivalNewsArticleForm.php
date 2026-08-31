<?php

namespace App\Filament\Resources\FestivalNewsArticles\Schemas;

use App\Models\FestivalEdition;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class FestivalNewsArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('festival_edition_id')
                    ->label('Edition (optional)')
                    ->options(fn () => FestivalEdition::query()->orderByDesc('year')->pluck('year', 'id')),
                TextInput::make('title')->required()->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                TextInput::make('slug')->required()->unique(ignoreRecord: true),
                FileUpload::make('image_path')->label('Image')->image()->directory('festival/news'),
                Textarea::make('excerpt')->rows(2),
                RichEditor::make('body')->required()->columnSpanFull(),
                DatePicker::make('published_at')->native(false),
            ]);
    }
}
