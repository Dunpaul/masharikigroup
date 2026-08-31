<?php

namespace App\Filament\Resources\Students\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class StudentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Registration')
                    ->columns(2)
                    ->components([
                        TextEntry::make('registration_id')->label('Reg. ID'),
                        TextEntry::make('payment_status')->badge(),
                    ]),
                Section::make('Student')
                    ->columns(2)
                    ->components([
                        TextEntry::make('company_contact_first_name')->label('First Name'),
                        TextEntry::make('company_contact_last_name')->label('Last Name'),
                        TextEntry::make('company_contact_phone')->label('Phone'),
                        TextEntry::make('company_contact_email')->label('Email'),
                        TextEntry::make('designation'),
                        TextEntry::make('attending_as')->badge(),
                    ]),
                Section::make('School')
                    ->columns(2)
                    ->components([
                        TextEntry::make('school_name'),
                        TextEntry::make('school_address'),
                        TextEntry::make('school_phone'),
                        TextEntry::make('school_email'),
                        TextEntry::make('school_website'),
                    ]),
            ]);
    }
}
