<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AcademyCohort extends Model
{
    protected $fillable = [
        'name',
        'status',
        'opened_at',
        'closed_at',
    ];

    protected function casts(): array
    {
        return [
            'opened_at' => 'datetime',
            'closed_at' => 'datetime',
        ];
    }

    public function submissions(): HasMany
    {
        return $this->hasMany(AcademyFormSubmission::class);
    }

    public static function current(): ?self
    {
        return static::where('status', 'open')->latest('opened_at')->first();
    }

    /**
     * Only one cohort is ever open — opening this one (creating it, or
     * re-opening it) closes whichever cohort was previously accepting
     * applications, so "the next registration opens" always means exactly
     * one active cohort at a time.
     */
    protected static function booted(): void
    {
        static::saving(function (self $cohort) {
            if ($cohort->status === 'open' && ! $cohort->opened_at) {
                $cohort->opened_at = now();
            }

            if ($cohort->status === 'closed' && ! $cohort->closed_at) {
                $cohort->closed_at = now();
            }
        });

        static::saved(function (self $cohort) {
            if ($cohort->status === 'open') {
                static::where('id', '!=', $cohort->id)
                    ->where('status', 'open')
                    ->each(fn (self $other) => $other->update(['status' => 'closed']));
            }
        });
    }
}
