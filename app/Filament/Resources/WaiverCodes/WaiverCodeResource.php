<?php

namespace App\Filament\Resources\WaiverCodes;

use App\Filament\Resources\WaiverCodes\Pages\ManageWaiverCodes;
use App\Models\WaiverCode;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class WaiverCodeResource extends Resource
{
    protected static ?string $model = WaiverCode::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|\UnitEnum|null $navigationGroup = 'Masharket';

    protected static ?string $recordTitleAttribute = 'code';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('code')->required()->unique(ignoreRecord: true)->default(fn () => WaiverCode::generateCode()),
                Toggle::make('available')->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('code')->fontFamily('mono')->copyable(),
                IconColumn::make('available')->boolean(),
                TextColumn::make('used_by_type')->label('Used By Type')->placeholder('—'),
                TextColumn::make('used_by_email')->label('Used By')->placeholder('—'),
                TextColumn::make('used_at')->dateTime()->placeholder('—'),
            ])
            ->filters([
                TernaryFilter::make('available'),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageWaiverCodes::route('/'),
        ];
    }
}
