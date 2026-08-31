<?php

namespace App\Filament\Resources\AcademyFormSubmissions\Tables;

use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class AcademyFormSubmissionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('full_name')->label('Name')->searchable(),
                TextColumn::make('email')->searchable(),
                TextColumn::make('program')->badge(),
                TextColumn::make('cohort.name')->label('Cohort')->badge()->color('gray'),
                TextColumn::make('created_at')->label('Submitted')->dateTime()->sortable(),
            ])
            ->filters([
                SelectFilter::make('program')
                    ->options(fn () => \App\Models\AcademyFormField::where('system_key', 'program')->first()?->resolvedOptions() ?? []),
            ])
            ->recordActions([
                ViewAction::make(),
            ])
            ->toolbarActions([
                //
            ]);
    }
}
