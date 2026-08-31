<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

/**
 * One shared gallery backend for all four brands. `brand` scopes every
 * query and every admin permission check; `festival_edition_id` is only
 * ever set for brand=festival (kept so the Festival Edition relation stays
 * real), while the denormalized `year` column is populated for every brand
 * so the public gallery can filter by year → day the same way everywhere.
 */
class GalleryImage extends Model
{
    protected $fillable = [
        'brand',
        'festival_edition_id',
        'year',
        'day',
        'category',
        'image_path',
        'thumb_path',
        'caption',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'day' => 'date',
        ];
    }

    public function edition(): BelongsTo
    {
        return $this->belongsTo(FestivalEdition::class, 'festival_edition_id');
    }

    protected static function booted(): void
    {
        static::deleting(function (self $image) {
            Storage::disk('public')->delete(array_filter([$image->image_path, $image->thumb_path]));
        });
    }
}
