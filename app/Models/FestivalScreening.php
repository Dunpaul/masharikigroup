<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FestivalScreening extends Model
{
    protected $fillable = [
        'festival_film_id',
        'festival_venue_id',
        'hall',
        'screening_date',
        'start_time',
        'end_time',
        'ticket_url',
        'sold_out',
        'has_qna',
    ];

    protected function casts(): array
    {
        return [
            'screening_date' => 'date',
            'sold_out' => 'boolean',
            'has_qna' => 'boolean',
        ];
    }

    public function film(): BelongsTo
    {
        return $this->belongsTo(FestivalFilm::class, 'festival_film_id');
    }

    public function venue(): BelongsTo
    {
        return $this->belongsTo(FestivalVenue::class, 'festival_venue_id');
    }
}
