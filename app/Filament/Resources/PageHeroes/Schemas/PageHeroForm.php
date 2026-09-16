<?php

namespace App\Filament\Resources\PageHeroes\Schemas;

use App\Filament\Resources\PageHeroes\PageHeroResource;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class PageHeroForm
{
    protected const BRAND_LABELS = [
        'group' => 'Mashariki Group',
        'academy' => 'Mashariki Arts Academy',
        'market' => 'Masharket',
        'festival' => 'Mashariki African Film Festival',
    ];

    public static function configure(Schema $schema): Schema
    {
        $allowed = PageHeroResource::allowedBrands();

        return $schema
            ->components([
                Select::make('brand')
                    ->label('Brand')
                    ->options(collect(self::BRAND_LABELS)->only($allowed)->all())
                    ->required()
                    ->live()
                    ->disabled(count($allowed) === 1)
                    ->dehydrated()
                    ->default(count($allowed) === 1 ? $allowed[0] : null),
                Select::make('page_key')
                    ->label('Page')
                    ->options(fn (Get $get) => config("page_heroes.keys.{$get('brand')}", []))
                    ->required()
                    ->live()
                    ->disabled(fn (Get $get) => ! $get('brand'))
                    ->helperText('Only pages that render a hero include appear here.'),
                FileUpload::make('uploads')
                    ->label('Images')
                    ->image()
                    ->multiple()
                    ->reorderable()
                    ->maxFiles(8)
                    ->directory('page-heroes/raw')
                    ->helperText('Upload one image for a static hero, or several for a carousel. Each is compressed to WebP automatically.')
                    ->visible(fn (string $operation) => $operation === 'create')
                    ->required(fn (string $operation) => $operation === 'create')
                    ->dehydrated(fn (string $operation) => $operation === 'create'),
                TextInput::make('caption')
                    ->helperText('Optional — not shown on the page, only used as fallback alt text.')
                    ->visible(fn (string $operation) => $operation === 'edit'),
                TextInput::make('alt_text')
                    ->helperText('Optional — describes the image for accessibility.')
                    ->visible(fn (string $operation) => $operation === 'edit'),
                TextInput::make('sort_order')
                    ->numeric()
                    ->default(0)
                    ->visible(fn (string $operation) => $operation === 'edit'),
                Toggle::make('is_active')
                    ->label('Active')
                    ->default(true)
                    ->visible(fn (string $operation) => $operation === 'edit'),
            ]);
    }
}
