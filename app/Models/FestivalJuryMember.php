<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FestivalJuryMember extends Model
{
    protected $fillable = [
        'festival_edition_id',
        'name',
        'role',
        'bio',
        'photo_path',
        'sort_order',
    ];

    protected static function booted(): void
    {
        static::addGlobalScope('sorted', fn ($query) => $query->orderBy('sort_order'));
    }

    public function edition(): BelongsTo
    {
        return $this->belongsTo(FestivalEdition::class, 'festival_edition_id');
    }
}
