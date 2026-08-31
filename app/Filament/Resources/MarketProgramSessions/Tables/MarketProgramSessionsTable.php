<?php

namespace App\Filament\Resources\MarketProgramSessions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class MarketProgramSessionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('sort_order')
            ->columns([
                TextColumn::make('day_number')->label('Day')->formatStateUsing(fn ($state) => "Day {$state}"),
                TextColumn::make('time_label'),
                TextColumn::make('title'),
                TextColumn::make('sort_order'),
            ])
            ->filters([
                SelectFilter::make('day_number')->options([
                    1 => 'Day 1',
                    2 => 'Day 2',
                    3 => 'Day 3',
                ]),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
