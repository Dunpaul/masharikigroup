<?php

namespace App\Filament\Resources\FestivalFilms\Schemas;

use App\Models\FestivalEdition;
use App\Models\FestivalGuest;
use App\Models\FestivalSection;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section as FormSection;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class FestivalFilmForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FormSection::make('Film')
                    ->columns(2)
                    ->components([
                        Select::make('festival_edition_id')
                            ->label('Edition')
                            ->options(fn () => FestivalEdition::query()->orderByDesc('year')->pluck('year', 'id'))
                            ->required()
                            ->live(),
                        Select::make('festival_section_id')
                            ->label('Section')
                            ->options(fn (callable $get) => FestivalSection::where('festival_edition_id', $get('festival_edition_id'))->pluck('name', 'id')),
                        TextInput::make('title')->required()->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                        TextInput::make('slug')->required(),
                        TextInput::make('original_title'),
                        TextInput::make('director'),
                        TextInput::make('country'),
                        TextInput::make('release_year')->numeric(),
                        TextInput::make('runtime_minutes')->numeric()->suffix('min'),
                        TextInput::make('language'),
                        TextInput::make('subtitles'),
                        TextInput::make('content_rating'),
                        TextInput::make('trailer_url')->url(),
                    ]),
                FormSection::make('Synopsis & Media')
                    ->components([
                        Textarea::make('synopsis')->rows(4),
                        Textarea::make('prior_awards_text')->rows(2)->label('Prior Awards'),
                        FileUpload::make('poster_path')->label('Poster')->image()->directory('festival/films'),
                        Repeater::make('stills')
                            ->label('Stills')
                            ->simple(FileUpload::make('path')->image()->directory('festival/films/stills'))
                            ->addActionLabel('Add still'),
                    ]),
                FormSection::make('Cast & Crew')
                    ->components([
                        Select::make('guests')
                            ->relationship('guests', 'name')
                            ->multiple()
                            ->options(fn (callable $get) => FestivalGuest::where('festival_edition_id', $get('festival_edition_id'))->pluck('name', 'id')),
                    ]),
                TextInput::make('sort_order')->numeric()->default(0),
            ]);
    }
}
