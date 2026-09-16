<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * One shared hero-image/carousel backend for every page across all four
 * brands. `page_key` is the route name (e.g. 'academy.home') — the
 * page-hero partial resolves rows implicitly from brand + current route,
 * so call sites never pass params. `festival.home` is deliberately never
 * used here — it keeps its own FestivalEdition::hero_image field.
 */
class PageHero extends Model
{
    protected $fillable = [
        'brand',
        'page_key',
        'image_path',
        'thumb_path',
        'caption',
        'alt_text',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    /**
     * Named ofPage(), not forPage() — Eloquent's query builder already has a
     * built-in forPage($page, $perPage) method used internally by
     * paginate(). A same-named local scope silently overrides it, so any
     * paginate() call (e.g. Filament's table) routes its (page, perPage)
     * arguments into this scope's (brand, pageKey) params instead of doing
     * pagination, breaking every paginated listing of this model.
     */
    public function scopeOfPage(Builder $query, string $brand, string $pageKey): Builder
    {
        return $query->where('brand', $brand)->where('page_key', $pageKey);
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    protected static function booted(): void
    {
        static::deleting(function (self $hero) {
            Storage::disk('public')->delete(array_filter([$hero->image_path, $hero->thumb_path]));
        });
    }
}
