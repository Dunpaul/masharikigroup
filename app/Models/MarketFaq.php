<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarketFaq extends Model
{
    protected $fillable = [
        'question',
        'answer',
        'sort_order',
    ];

    protected static function booted(): void
    {
        static::addGlobalScope('sorted', fn ($query) => $query->orderBy('sort_order'));
    }
}
