<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarketTeamMember extends Model
{
    protected $fillable = [
        'name',
        'role',
        'photo_path',
        'sort_order',
    ];

    protected static function booted(): void
    {
        static::addGlobalScope('sorted', fn ($query) => $query->orderBy('sort_order'));
    }
}
