<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FestivalSettings extends Model
{
    protected $fillable = [
        'canonical_name',
        'acronym',
        'media_kit_path',
        'accreditation_info',
        'press_contact_email',
        'contact_phone',
        'contact_email',
        'socials',
    ];

    protected function casts(): array
    {
        return [
            'socials' => 'array',
        ];
    }

    public static function current(): self
    {
        return static::query()->firstOrCreate([]);
    }
}
