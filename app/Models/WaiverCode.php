<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class WaiverCode extends Model
{
    protected $fillable = [
        'code',
        'available',
        'used_by_type',
        'used_by_email',
        'used_at',
    ];

    protected function casts(): array
    {
        return [
            'available' => 'boolean',
            'used_at' => 'datetime',
        ];
    }

    public static function generateCode(): string
    {
        do {
            $code = strtoupper(Str::random(8));
        } while (static::where('code', $code)->exists());

        return $code;
    }
}
