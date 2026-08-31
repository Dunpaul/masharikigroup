<?php

namespace App\Filament\Resources\Exhibitors\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ExhibitorsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('registration_id')->label('Reg. ID'),
                TextColumn::make('company_name')->searchable(),
                TextColumn::make('company_contact_first_name')
                    ->label('Contact')
                    ->formatStateUsing(fn ($record) => "{$record->company_contact_first_name} {$record->company_contact_last_name}")
                    ->searchable(['company_contact_first_name', 'company_contact_last_name']),
                TextColumn::make('company_contact_email')->label('Email')->searchable(),
                TextColumn::make('attending_as')->badge(),
                TextColumn::make('payment_status')
                    ->badge()
                    ->color(fn (string $state) => $state === 'paid' ? 'success' : 'warning'),
                TextColumn::make('created_at')->label('Registered')->dateTime()->sortable(),
            ])
            ->filters([
                SelectFilter::make('payment_status')->options([
                    'unpaid' => 'Unpaid',
                    'paid' => 'Paid',
                ]),
                SelectFilter::make('attending_as')->options([
                    'buyer' => 'Buyer',
                    'seller' => 'Seller',
                    'vendor' => 'Vendor',
                    'official' => 'Official',
                    'visitor' => 'Visitor',
                    'press' => 'Press',
                ]),
            ])
            ->recordActions([
                Action::make('togglePaymentStatus')
                    ->label(fn ($record) => $record->payment_status === 'paid' ? 'Mark Unpaid' : 'Mark Paid')
                    ->icon('heroicon-o-currency-dollar')
                    ->color(fn ($record) => $record->payment_status === 'paid' ? 'gray' : 'success')
                    ->requiresConfirmation()
                    ->action(function ($record) {
                        $record->update(['payment_status' => $record->payment_status === 'paid' ? 'unpaid' : 'paid']);
                        Notification::make()
                            ->title('Payment status updated')
                            ->success()
                            ->send();
                    }),
                Action::make('viewTicket')
                    ->label('View Ticket')
                    ->icon('heroicon-o-ticket')
                    ->url(fn ($record) => route('market.ticket.show', ['type' => 'exhibitor', 'registrationId' => $record->registration_id]))
                    ->openUrlInNewTab()
                    ->visible(fn ($record) => $record->payment_status === 'paid'),
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
