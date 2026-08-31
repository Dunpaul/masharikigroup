<?php

namespace App\Filament\Resources\Exhibitors\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ExhibitorInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Registration')
                    ->columns(3)
                    ->components([
                        TextEntry::make('registration_id')->label('Reg. ID'),
                        TextEntry::make('payment_status')->badge(),
                        TextEntry::make('attending_as')->badge(),
                    ]),
                Section::make('Primary Contact')
                    ->columns(2)
                    ->components([
                        TextEntry::make('company_contact_first_name')->label('First Name'),
                        TextEntry::make('company_contact_last_name')->label('Last Name'),
                        TextEntry::make('company_contact_phone')->label('Phone'),
                        TextEntry::make('company_contact_email')->label('Email'),
                        TextEntry::make('designation'),
                    ]),
                Section::make('Alternative Contact')
                    ->columns(2)
                    ->components([
                        TextEntry::make('company_contact_alt_first_name')->label('First Name')->placeholder('—'),
                        TextEntry::make('company_contact_alt_last_name')->label('Last Name')->placeholder('—'),
                        TextEntry::make('company_contact_alt_phone')->label('Phone')->placeholder('—'),
                        TextEntry::make('company_contact_alt_email')->label('Email')->placeholder('—'),
                    ]),
                Section::make('Company')
                    ->columns(2)
                    ->components([
                        TextEntry::make('company_name'),
                        TextEntry::make('company_address'),
                        TextEntry::make('company_phone'),
                        TextEntry::make('company_email'),
                        TextEntry::make('company_website'),
                        TextEntry::make('company_services'),
                        TextEntry::make('company_services_exhibited')->columnSpanFull(),
                    ]),
                Section::make('Provisions & Products')
                    ->components([
                        TextEntry::make('company_provisions')->label('Services Provided')->listWithLineBreaks()->placeholder('—'),
                        TextEntry::make('company_products')->label('Content Genres')->listWithLineBreaks()->placeholder('—'),
                        TextEntry::make('company_products_other')->label('Other')->placeholder('—'),
                    ]),
            ]);
    }
}
