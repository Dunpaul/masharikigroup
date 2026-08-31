<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FestivalNewsArticle extends Model
{
    protected $fillable = [
        'festival_edition_id',
        'title',
        'slug',
        'image_path',
        'excerpt',
        'body',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'date',
        ];
    }

    protected static function booted(): void
    {
        static::addGlobalScope('published', fn ($query) => $query->orderByDesc('published_at'));
    }

    public function edition(): BelongsTo
    {
        return $this->belongsTo(FestivalEdition::class, 'festival_edition_id');
    }
}
