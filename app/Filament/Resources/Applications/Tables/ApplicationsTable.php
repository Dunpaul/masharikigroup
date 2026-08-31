<?php

namespace App\Filament\Resources\Applications\Tables;

use App\Models\AcademyProgram;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ApplicationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('full_name')->searchable(),
                TextColumn::make('email')->searchable(),
                TextColumn::make('specialization')
                    ->formatStateUsing(fn (string $state) => str($state)->replace('_', ' ')->title())
                    ->badge(),
                TextColumn::make('phone'),
                TextColumn::make('created_at')->label('Submitted')->dateTime()->sortable(),
            ])
            ->filters([
                SelectFilter::make('specialization')
                    ->options(fn () => AcademyProgram::query()->pluck('title', 'specialization_key')),
            ])
            ->recordActions([
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
