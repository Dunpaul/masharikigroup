<?php

namespace App\Filament\Resources\AcademyFormFields\Tables;

use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AcademyFormFieldsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->reorderable('sort_order')
            ->defaultSort('sort_order')
            ->columns([
                TextColumn::make('label'),
                TextColumn::make('key')->badge()->color('gray'),
                TextColumn::make('type')->badge(),
                IconColumn::make('required')->boolean(),
                TextColumn::make('system_key')->label('Protected')->placeholder('—'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make()
                    ->hidden(fn ($record) => filled($record->system_key)),
            ])
            ->toolbarActions([
                //
            ]);
    }
}
