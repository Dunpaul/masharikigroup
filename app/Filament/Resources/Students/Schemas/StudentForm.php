<?php

namespace App\Filament\Resources\Students\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class StudentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Registration')
                    ->columns(2)
                    ->components([
                        TextInput::make('registration_id')->disabled(),
                        Select::make('payment_status')->options([
                            'unpaid' => 'Unpaid',
                            'paid' => 'Paid',
                        ])->required(),
                    ]),
                Section::make('Student')
                    ->columns(2)
                    ->components([
                        TextInput::make('company_contact_first_name')->label('First Name')->required(),
                        TextInput::make('company_contact_last_name')->label('Last Name')->required(),
                        TextInput::make('company_contact_phone')->label('Phone')->required(),
                        TextInput::make('company_contact_email')->label('Email')->email()->required(),
                        TextInput::make('designation')->required(),
                        Select::make('attending_as')->required()->options([
                            'buyer' => 'Buyer',
                            'seller' => 'Seller',
                            'vendor' => 'Vendor',
                            'official' => 'Official',
                            'visitor' => 'Visitor',
                            'press' => 'Press',
                        ]),
                    ]),
                Section::make('School')
                    ->columns(2)
                    ->components([
                        TextInput::make('school_name')->required(),
                        TextInput::make('school_address')->required(),
                        TextInput::make('school_phone')->required(),
                        TextInput::make('school_email')->email()->required(),
                        TextInput::make('school_website')->required(),
                    ]),
            ]);
    }
}
