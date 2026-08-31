<?php

namespace App\Filament\Resources\Students\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class StudentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('registration_id')->label('Reg. ID'),
                TextColumn::make('company_contact_first_name')
                    ->label('Name')
                    ->formatStateUsing(fn ($record) => "{$record->company_contact_first_name} {$record->company_contact_last_name}")
                    ->searchable(['company_contact_first_name', 'company_contact_last_name']),
                TextColumn::make('company_contact_email')->label('Email')->searchable(),
                TextColumn::make('school_name')->searchable(),
                TextColumn::make('payment_status')->badge()->color('success'),
                TextColumn::make('created_at')->label('Registered')->dateTime()->sortable(),
            ])
            ->recordActions([
                Action::make('viewTicket')
                    ->label('View Ticket')
                    ->icon('heroicon-o-ticket')
                    ->url(fn ($record) => route('market.ticket.show', ['type' => 'student', 'registrationId' => $record->registration_id]))
                    ->openUrlInNewTab(),
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
