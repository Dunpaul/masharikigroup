<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarketNewsArticle extends Model
{
    protected $fillable = [
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
}
