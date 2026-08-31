<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademyProgram extends Model
{
    protected $fillable = [
        'title',
        'specialization_key',
        'description',
        'image_url',
        'sort_order',
    ];

    protected static function booted(): void
    {
        static::addGlobalScope('sorted', fn ($query) => $query->orderBy('sort_order'));
    }
}
