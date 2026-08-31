<?php

namespace App\Filament\Resources\AcademyCohorts\Tables;

use App\Models\AcademyCohort;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AcademyCohortsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('status')->badge()->color(fn (string $state) => $state === 'open' ? 'success' : 'gray'),
                TextColumn::make('submissions_count')->counts('submissions')->label('Applicants'),
                TextColumn::make('opened_at')->dateTime(),
                TextColumn::make('closed_at')->dateTime(),
            ])
            ->recordActions([
                Action::make('close')
                    ->label('Close Registration')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->visible(fn (AcademyCohort $record) => $record->status === 'open')
                    ->action(fn (AcademyCohort $record) => $record->update(['status' => 'closed'])),
                Action::make('reopen')
                    ->label('Re-open')
                    ->color('success')
                    ->requiresConfirmation()
                    ->modalDescription('This will close whichever cohort is currently open and make this one the active one for new applications.')
                    ->visible(fn (AcademyCohort $record) => $record->status === 'closed')
                    ->action(fn (AcademyCohort $record) => $record->update(['status' => 'open'])),
                EditAction::make(),
            ])
            ->toolbarActions([
                //
            ]);
    }
}
