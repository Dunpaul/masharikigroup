<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarketCategory extends Model
{
    protected $fillable = [
        'title',
        'description',
        'cta_label',
        'cta_url',
        'sort_order',
    ];

    protected static function booted(): void
    {
        static::addGlobalScope('sorted', fn ($query) => $query->orderBy('sort_order'));
    }
}
