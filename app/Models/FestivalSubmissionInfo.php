<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FestivalSubmissionInfo extends Model
{
    protected $fillable = [
        'festival_edition_id',
        'guidelines',
        'categories',
        'deadline_early',
        'deadline_regular',
        'deadline_late',
        'fees',
        'filmfreeway_url',
    ];

    protected function casts(): array
    {
        return [
            'deadline_early' => 'date',
            'deadline_regular' => 'date',
            'deadline_late' => 'date',
        ];
    }

    public function edition(): BelongsTo
    {
        return $this->belongsTo(FestivalEdition::class, 'festival_edition_id');
    }
}
