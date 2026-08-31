<?php

namespace App\Filament\Resources\FestivalFilms\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class FestivalFilmsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('sort_order')
            ->columns([
                ImageColumn::make('poster_path')->label('Poster'),
                TextColumn::make('title')->searchable(),
                TextColumn::make('edition.year')->label('Edition'),
                TextColumn::make('section.name')->label('Section'),
                TextColumn::make('country'),
                TextColumn::make('director'),
            ])
            ->filters([
                SelectFilter::make('festival_edition_id')
                    ->label('Edition')
                    ->relationship('edition', 'year'),
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
