<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupPartner extends Model
{
    protected $fillable = [
        'name',
        'logo_path',
        'url',
        'featured',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'featured' => 'boolean',
        ];
    }

    protected static function booted(): void
    {
        static::addGlobalScope('sorted', fn ($query) => $query->orderBy('sort_order'));
    }
}
