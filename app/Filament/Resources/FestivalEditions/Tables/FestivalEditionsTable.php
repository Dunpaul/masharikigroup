<?php

namespace App\Filament\Resources\FestivalEditions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FestivalEditionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('year', 'desc')
            ->columns([
                TextColumn::make('year'),
                TextColumn::make('edition_number')->label('Edition #'),
                TextColumn::make('theme_name'),
                TextColumn::make('status')->badge()->color(fn (string $state) => match ($state) {
                    'current' => 'success',
                    'upcoming' => 'warning',
                    default => 'gray',
                }),
                TextColumn::make('start_date')->date(),
                TextColumn::make('end_date')->date(),
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
