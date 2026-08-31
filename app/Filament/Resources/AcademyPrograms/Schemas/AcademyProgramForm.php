<?php

namespace App\Filament\Resources\AcademyPrograms\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class AcademyProgramForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')->required()->live(onBlur: true)
                    ->afterStateUpdated(function (string $context, $state, callable $set) {
                        if ($context === 'create') {
                            $set('specialization_key', Str::slug($state, '_'));
                        }
                    }),
                TextInput::make('specialization_key')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->helperText('Used as the value in the admissions form and stored on each application. Changing this after applications exist will not update those already submitted.'),
                Textarea::make('description')->required()->rows(4),
                TextInput::make('image_url')->url()->required()->columnSpanFull(),
                TextInput::make('sort_order')->numeric()->default(0),
            ]);
    }
}
