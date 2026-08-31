<?php

namespace App\Filament\Resources\FestivalScreenings\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FestivalScreeningsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('screening_date')
            ->columns([
                TextColumn::make('film.title')->searchable(),
                TextColumn::make('venue.name'),
                TextColumn::make('screening_date')->date(),
                TextColumn::make('start_time')->time('g:i A'),
                IconColumn::make('sold_out')->boolean(),
                IconColumn::make('has_qna')->label('Q&A')->boolean(),
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
