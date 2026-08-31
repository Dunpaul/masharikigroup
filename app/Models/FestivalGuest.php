<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class FestivalGuest extends Model
{
    protected $fillable = [
        'festival_edition_id',
        'name',
        'role',
        'bio',
        'photo_path',
        'country',
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

    public function films(): BelongsToMany
    {
        return $this->belongsToMany(FestivalFilm::class, 'festival_film_guest')
            ->withPivot('role_on_film')
            ->withTimestamps();
    }

    public function programs(): BelongsToMany
    {
        return $this->belongsToMany(FestivalProgram::class, 'festival_program_guest')
            ->withTimestamps();
    }
}
