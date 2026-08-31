<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarketSettings extends Model
{
    protected $fillable = [
        'event_name',
        'theme',
        'start_date',
        'end_date',
        'venue_name',
        'venue_address',
        'map_embed_url',
        'intro_paragraph_1',
        'intro_paragraph_2',
        'contact_phone_1',
        'contact_phone_2',
        'contact_email',
        'socials',
    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
            'socials' => 'array',
        ];
    }

    public static function current(): self
    {
        return static::query()->firstOrCreate([]);
    }
}
