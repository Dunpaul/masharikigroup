<?php

namespace App\Filament\Resources\WaiverCodes\Pages;

use App\Filament\Resources\WaiverCodes\WaiverCodeResource;
use App\Models\WaiverCode;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ManageRecords;

class ManageWaiverCodes extends ManageRecords
{
    protected static string $resource = WaiverCodeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('generateBatch')
                ->label('Generate Codes')
                ->icon('heroicon-o-sparkles')
                ->schema([
                    TextInput::make('quantity')
                        ->numeric()
                        ->required()
                        ->default(10)
                        ->minValue(1)
                        ->maxValue(200),
                ])
                ->action(function (array $data) {
                    for ($i = 0; $i < $data['quantity']; $i++) {
                        WaiverCode::create(['code' => WaiverCode::generateCode()]);
                    }

                    Notification::make()
                        ->title("{$data['quantity']} waiver codes generated")
                        ->success()
                        ->send();
                }),
            CreateAction::make(),
        ];
    }
}
