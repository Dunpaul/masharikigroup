<?php

namespace App\Filament\Resources\FestivalPrograms\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class FestivalProgramsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('event_date')
            ->columns([
                TextColumn::make('title')->searchable(),
                TextColumn::make('type')->badge(),
                TextColumn::make('venue.name'),
                TextColumn::make('event_date')->date(),
                TextColumn::make('edition.year')->label('Edition'),
            ])
            ->filters([
                SelectFilter::make('type')->options([
                    'panel' => 'Panel',
                    'masterclass' => 'Masterclass',
                    'workshop' => 'Workshop',
                    'ceremony' => 'Ceremony',
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
