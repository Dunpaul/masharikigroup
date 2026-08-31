<?php

namespace App\Filament\Resources\GalleryImages\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class GalleryImagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->reorderable('sort_order')
            ->defaultSort('sort_order')
            ->columns([
                ImageColumn::make('thumb_path')->label('Photo')->disk('public'),
                TextColumn::make('brand')->badge(),
                TextColumn::make('year')->sortable(),
                TextColumn::make('day')->date(),
                TextColumn::make('category')->badge(),
                TextColumn::make('caption')->limit(40),
            ])
            ->filters([
                SelectFilter::make('brand')->options([
                    'group' => 'Group',
                    'academy' => 'Academy',
                    'market' => 'Masharket',
                    'festival' => 'Festival',
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
