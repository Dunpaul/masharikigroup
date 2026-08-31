<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AcademyFormSubmission extends Model
{
    protected $fillable = [
        'academy_cohort_id',
        'full_name',
        'email',
        'program',
        'answers',
        'portfolio_files',
        'ip_address',
        'user_agent',
        'submitted_at',
    ];

    protected function casts(): array
    {
        return [
            'answers' => 'array',
            'portfolio_files' => 'array',
            'submitted_at' => 'datetime',
        ];
    }

    public function cohort(): BelongsTo
    {
        return $this->belongsTo(AcademyCohort::class, 'academy_cohort_id');
    }
}
