<?php

namespace App\Filament\Resources\GalleryImages;

use App\Filament\Resources\GalleryImages\Pages\CreateGalleryImage;
use App\Filament\Resources\GalleryImages\Pages\EditGalleryImage;
use App\Filament\Resources\GalleryImages\Pages\ListGalleryImages;
use App\Filament\Resources\GalleryImages\Schemas\GalleryImageForm;
use App\Filament\Resources\GalleryImages\Tables\GalleryImagesTable;
use App\Models\GalleryImage;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class GalleryImageResource extends Resource
{
    protected static ?string $model = GalleryImage::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPhoto;

    protected static string|\UnitEnum|null $navigationGroup = 'Gallery';

    protected static ?string $navigationLabel = 'Gallery';

    public static function allowedBrands(): array
    {
        $user = auth()->user();

        if (! $user) {
            return [];
        }

        if ($user->hasRole('super-admin')) {
            return ['group', 'academy', 'market', 'festival'];
        }

        return collect(['group', 'academy', 'market', 'festival'])
            ->filter(fn (string $brand) => $user->can("brand:{$brand}"))
            ->values()
            ->all();
    }

    /**
     * Real query-level scoping: a section admin's index, edit, and delete
     * actions can only ever touch rows in their own brand(s) — not just a
     * hidden nav item, since the underlying table is shared across brands.
     */
    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        $user = auth()->user();

        if ($user && ! $user->hasRole('super-admin')) {
            $query->whereIn('brand', static::allowedBrands());
        }

        return $query;
    }

    public static function form(Schema $schema): Schema
    {
        return GalleryImageForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GalleryImagesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListGalleryImages::route('/'),
            'create' => CreateGalleryImage::route('/create'),
            'edit' => EditGalleryImage::route('/{record}/edit'),
        ];
    }
}
