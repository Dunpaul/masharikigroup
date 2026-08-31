<?php

namespace App\Filament\Resources\Applications\Schemas;

use App\Models\AcademyProgram;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ApplicationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Applicant')
                    ->columns(2)
                    ->components([
                        TextInput::make('full_name')->required(),
                        TextInput::make('email')->email()->required(),
                        TextInput::make('phone')->required(),
                        DatePicker::make('date_of_birth')->required()->native(false),
                        TextInput::make('nationality')->required(),
                        Select::make('gender')->options([
                            'male' => 'Male',
                            'female' => 'Female',
                            'other' => 'Other',
                        ]),
                        Textarea::make('address')->required()->columnSpanFull(),
                    ]),
                Section::make('Program')
                    ->columns(2)
                    ->components([
                        Select::make('specialization')
                            ->required()
                            ->options(fn () => AcademyProgram::query()->pluck('title', 'specialization_key')),
                        TextInput::make('education_level')->required(),
                        TextInput::make('institution')->required(),
                        TextInput::make('year_completed')->numeric()->required(),
                    ]),
                Section::make('Motivation')
                    ->components([
                        Textarea::make('motivation')->required()->rows(6),
                    ]),
            ]);
    }
}
