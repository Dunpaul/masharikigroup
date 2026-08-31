<?php

namespace App\Filament\Resources\FestivalJuryMembers\Schemas;

use App\Models\FestivalEdition;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class FestivalJuryMemberForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('festival_edition_id')
                    ->label('Edition')
                    ->options(fn () => FestivalEdition::query()->orderByDesc('year')->pluck('year', 'id'))
                    ->required(),
                TextInput::make('name')->required(),
                TextInput::make('role')->placeholder('Jury President, Jury Member...'),
                Textarea::make('bio')->rows(4),
                FileUpload::make('photo_path')->label('Photo')->image()->directory('festival/jury'),
                TextInput::make('sort_order')->numeric()->default(0),
            ]);
    }
}
