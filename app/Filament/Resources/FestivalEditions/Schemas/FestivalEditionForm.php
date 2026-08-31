<?php

namespace App\Filament\Resources\FestivalEditions\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FestivalEditionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Edition')
                    ->columns(2)
                    ->components([
                        TextInput::make('year')->numeric()->required(),
                        TextInput::make('edition_number')->numeric()->required(),
                        Select::make('status')->required()->options([
                            'upcoming' => 'Upcoming',
                            'current' => 'Current',
                            'archived' => 'Archived',
                        ]),
                        TextInput::make('tagline'),
                        DatePicker::make('start_date')->native(false),
                        DatePicker::make('end_date')->native(false),
                    ]),
                Section::make('Theme')
                    ->components([
                        TextInput::make('theme_name')->columnSpanFull(),
                        Textarea::make('theme_statement')->rows(3)->columnSpanFull(),
                        FileUpload::make('hero_image')->image()->directory('festival/editions'),
                    ]),
                Section::make('Primary CTA')
                    ->description("The festival is free — there is no ticketing or reservation flow. This only controls the wording/destination of the single homepage CTA.")
                    ->columns(2)
                    ->components([
                        Select::make('cta_phase')
                            ->label('Phase')
                            ->required()
                            ->options([
                                'submissions' => 'Call for Entries open → "Submit Your Film"',
                                'program_published' => 'Program published (festival live) → "Plan Your Visit"',
                            ])
                            ->helperText('Ignored if a label + URL override below is set.'),
                        TextInput::make('cta_label_override')
                            ->label('Label override (optional)'),
                        TextInput::make('cta_url_override')
                            ->label('URL override (optional)')
                            ->url()
                            ->helperText('E.g. a direct FilmFreeway link. Leave both overrides blank to use the phase default above.'),
                    ]),
            ]);
    }
}
