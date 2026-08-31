<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'full_name',
        'date_of_birth',
        'nationality',
        'affiliated_with_norxen',
        'address',
        'phone',
        'email',
        'id_number',
        'gender',
        'specialization',
        'education_level',
        'institution',
        'year_completed',
        'has_experience',
        'experience_description',
        'motivation',
        'commitment',
        'declaration_name',
        'declaration_date',
        'declaration_agree',
        'portfolio_files',
        'ip_address',
        'user_agent',
    ];

    protected function casts(): array
    {
        return [
            'date_of_birth' => 'date',
            'declaration_date' => 'date',
            'commitment' => 'boolean',
            'declaration_agree' => 'boolean',
            'portfolio_files' => 'array',
            'submitted_at' => 'datetime',
        ];
    }
}
