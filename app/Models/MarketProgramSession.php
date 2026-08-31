<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarketProgramSession extends Model
{
    protected $fillable = [
        'day_number',
        'time_label',
        'title',
        'description',
        'sort_order',
    ];

    protected static function booted(): void
    {
        static::addGlobalScope('sorted', fn ($query) => $query->orderBy('day_number')->orderBy('sort_order'));
    }
}
