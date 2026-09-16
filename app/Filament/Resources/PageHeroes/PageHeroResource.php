<?php

namespace App\Filament\Resources\PageHeroes;

use App\Filament\Resources\PageHeroes\Pages\CreatePageHero;
use App\Filament\Resources\PageHeroes\Pages\EditPageHero;
use App\Filament\Resources\PageHeroes\Pages\ListPageHeroes;
use App\Filament\Resources\PageHeroes\Schemas\PageHeroForm;
use App\Filament\Resources\PageHeroes\Tables\PageHeroesTable;
use App\Models\PageHero;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class PageHeroResource extends Resource
{
    protected static ?string $model = PageHero::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|\UnitEnum|null $navigationGroup = 'Page Heroes';

    protected static ?string $navigationLabel = 'Page Heroes';

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
        return PageHeroForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PageHeroesTable::configure($table);
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
            'index' => ListPageHeroes::route('/'),
            'create' => CreatePageHero::route('/create'),
            'edit' => EditPageHero::route('/{record}/edit'),
        ];
    }
}
