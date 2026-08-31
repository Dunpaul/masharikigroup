<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class FestivalProgram extends Model
{
    protected $fillable = [
        'festival_edition_id',
        'festival_venue_id',
        'title',
        'type',
        'description',
        'event_date',
        'start_time',
        'end_time',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'event_date' => 'date',
        ];
    }

    protected static function booted(): void
    {
        static::addGlobalScope('sorted', fn ($query) => $query->orderBy('event_date')->orderBy('start_time'));
    }

    public function edition(): BelongsTo
    {
        return $this->belongsTo(FestivalEdition::class, 'festival_edition_id');
    }

    public function venue(): BelongsTo
    {
        return $this->belongsTo(FestivalVenue::class, 'festival_venue_id');
    }

    public function speakers(): BelongsToMany
    {
        return $this->belongsToMany(FestivalGuest::class, 'festival_program_guest')
            ->withTimestamps();
    }
}
