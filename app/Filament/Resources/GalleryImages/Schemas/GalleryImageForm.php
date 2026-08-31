<?php

namespace App\Filament\Resources\GalleryImages\Schemas;

use App\Filament\Resources\GalleryImages\GalleryImageResource;
use App\Models\FestivalEdition;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class GalleryImageForm
{
    protected const BRAND_LABELS = [
        'group' => 'Mashariki Group',
        'academy' => 'Mashariki Arts Academy',
        'market' => 'Masharket',
        'festival' => 'Mashariki African Film Festival',
    ];

    public static function configure(Schema $schema): Schema
    {
        $allowed = GalleryImageResource::allowedBrands();

        return $schema
            ->components([
                Select::make('brand')
                    ->label('Section')
                    ->options(collect(self::BRAND_LABELS)->only($allowed)->all())
                    ->required()
                    ->live()
                    ->disabled(count($allowed) === 1)
                    ->dehydrated()
                    ->default(count($allowed) === 1 ? $allowed[0] : null),
                Select::make('festival_edition_id')
                    ->label('Edition (Year)')
                    ->options(fn () => FestivalEdition::query()
                        ->orderByDesc('year')
                        ->get()
                        ->mapWithKeys(fn (FestivalEdition $edition) => [$edition->id => "{$edition->year} — Edition {$edition->edition_number}"]))
                    ->visible(fn (Get $get) => $get('brand') === 'festival')
                    ->required(fn (Get $get) => $get('brand') === 'festival')
                    ->searchable(),
                TextInput::make('year')
                    ->numeric()
                    ->visible(fn (Get $get) => $get('brand') && $get('brand') !== 'festival')
                    ->helperText('Which year these photos are from.'),
                DatePicker::make('day')
                    ->label('Event Day')
                    ->helperText('Optional — the specific day within the year/edition these photos were taken.')
                    ->native(false),
                TextInput::make('category')
                    ->helperText('Optional grouping, e.g. "opening night", "venue", "press". Free text.'),
                FileUpload::make('uploads')
                    ->label('Photos')
                    ->image()
                    ->multiple()
                    ->reorderable()
                    ->directory('gallery/raw')
                    ->helperText('Upload as many photos as you like from this batch — Section, Year/Edition, Day, and Category above apply to all of them. Each is compressed to WebP automatically.')
                    ->visible(fn (string $operation) => $operation === 'create')
                    ->required(fn (string $operation) => $operation === 'create')
                    ->dehydrated(fn (string $operation) => $operation === 'create'),
                TextInput::make('caption')
                    ->visible(fn (string $operation) => $operation === 'edit'),
                TextInput::make('sort_order')
                    ->numeric()
                    ->default(0),
            ]);
    }
}
