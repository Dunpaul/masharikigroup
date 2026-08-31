<?php

namespace App\Filament\Resources\VirtualAttendants\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class VirtualAttendantForm
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
                Section::make('Primary Contact')
                    ->columns(2)
                    ->components([
                        TextInput::make('company_contact_first_name')->required(),
                        TextInput::make('company_contact_last_name')->required(),
                        TextInput::make('company_contact_phone')->required(),
                        TextInput::make('company_contact_email')->email()->required(),
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
                Section::make('Company')
                    ->columns(2)
                    ->components([
                        TextInput::make('company_name')->required(),
                        TextInput::make('company_address')->required(),
                        TextInput::make('company_phone')->required(),
                        TextInput::make('company_email')->email()->required(),
                        TextInput::make('company_website')->required(),
                        TextInput::make('company_services')->required(),
                        Textarea::make('company_services_exhibited')->required()->columnSpanFull(),
                    ]),
            ]);
    }
}
