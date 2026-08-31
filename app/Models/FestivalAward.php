<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FestivalAward extends Model
{
    protected $fillable = [
        'festival_edition_id',
        'category',
        'winner_film_id',
        'winner_name',
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

    public function winnerFilm(): BelongsTo
    {
        return $this->belongsTo(FestivalFilm::class, 'winner_film_id');
    }
}
