<?php

namespace App\Filament\Resources\AcademyFormFields\Schemas;

use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class AcademyFormFieldForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('label')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (Get $get, $state, $set, ?string $operation) {
                        if ($operation === 'create') {
                            $set('key', Str::slug($state, '_'));
                        }
                    }),
                TextInput::make('key')
                    ->required()
                    ->alphaDash()
                    ->unique(ignoreRecord: true)
                    ->disabled(fn (?\App\Models\AcademyFormField $record) => filled($record?->system_key))
                    ->dehydrated()
                    ->helperText('Used internally as the answer key. Auto-filled from the label.'),
                Placeholder::make('system_key_notice')
                    ->label('')
                    ->content('This is a protected field used to index submissions (name, email, or program) — it can be relabeled but not deleted or retyped.')
                    ->visible(fn (?\App\Models\AcademyFormField $record) => filled($record?->system_key)),
                Select::make('type')
                    ->required()
                    ->live()
                    ->disabled(fn (?\App\Models\AcademyFormField $record) => filled($record?->system_key))
                    ->options([
                        'text' => 'Text',
                        'email' => 'Email',
                        'tel' => 'Phone',
                        'textarea' => 'Long text',
                        'select' => 'Dropdown',
                        'radio' => 'Radio buttons',
                        'checkbox' => 'Checkbox (yes/no)',
                        'date' => 'Date',
                        'file' => 'File upload',
                    ]),
                TagsInput::make('options')
                    ->label('Options')
                    ->helperText('Ignored for the Program field — its options always mirror the live Academy programs list.')
                    ->visible(fn (Get $get) => in_array($get('type'), ['select', 'radio']))
                    ->required(fn (Get $get) => in_array($get('type'), ['select', 'radio'])),
                Toggle::make('multiple')
                    ->label('Allow multiple selections / files')
                    ->visible(fn (Get $get) => in_array($get('type'), ['select', 'file'])),
                Toggle::make('required')
                    ->default(false),
                TextInput::make('sort_order')
                    ->numeric()
                    ->default(0),
            ]);
    }
}
