<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FestivalFilm extends Model
{
    protected $fillable = [
        'festival_edition_id',
        'festival_section_id',
        'title',
        'slug',
        'original_title',
        'director',
        'country',
        'release_year',
        'runtime_minutes',
        'language',
        'subtitles',
        'synopsis',
        'poster_path',
        'stills',
        'trailer_url',
        'content_rating',
        'prior_awards_text',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'stills' => 'array',
        ];
    }

    public function edition(): BelongsTo
    {
        return $this->belongsTo(FestivalEdition::class, 'festival_edition_id');
    }

    public function section(): BelongsTo
    {
        return $this->belongsTo(FestivalSection::class, 'festival_section_id');
    }

    public function screenings(): HasMany
    {
        return $this->hasMany(FestivalScreening::class);
    }

    public function guests(): BelongsToMany
    {
        return $this->belongsToMany(FestivalGuest::class, 'festival_film_guest')
            ->withPivot('role_on_film')
            ->withTimestamps();
    }
}
