<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FestivalVenue extends Model
{
    protected $fillable = [
        'name',
        'address',
        'latitude',
        'longitude',
        'capacity',
        'photo',
        'accessibility_info',
        'transport_notes',
        'sort_order',
    ];

    protected static function booted(): void
    {
        static::addGlobalScope('sorted', fn ($query) => $query->orderBy('sort_order'));
    }

    public function screenings(): HasMany
    {
        return $this->hasMany(FestivalScreening::class);
    }

    public function programs(): HasMany
    {
        return $this->hasMany(FestivalProgram::class);
    }
}
