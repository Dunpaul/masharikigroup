<?php

namespace App\Filament\Resources\PageHeroes\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class PageHeroesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->reorderable('sort_order')
            ->defaultSort('sort_order')
            ->description('Reordering changes this row\'s position within its own page\'s carousel. Filter to one Brand + Page combination before dragging rows, since sort_order is only meaningful within that scope.')
            ->columns([
                ImageColumn::make('thumb_path')->label('Image')->disk('public'),
                TextColumn::make('brand')->badge(),
                TextColumn::make('page_key')->label('Page')->badge(),
                TextColumn::make('caption')->limit(40),
                IconColumn::make('is_active')->label('Active')->boolean(),
            ])
            ->filters([
                SelectFilter::make('brand')->options([
                    'group' => 'Group',
                    'academy' => 'Academy',
                    'market' => 'Masharket',
                    'festival' => 'Festival',
                ]),
                SelectFilter::make('page_key')
                    ->label('Page')
                    ->options(fn () => collect(config('page_heroes.keys'))->collapse()->all()),
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
