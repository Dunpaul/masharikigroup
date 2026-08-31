<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'registration_id',
        'company_contact_first_name',
        'company_contact_last_name',
        'company_contact_phone',
        'company_contact_email',
        'designation',
        'attending_as',
        'school_name',
        'school_address',
        'school_phone',
        'school_email',
        'school_website',
        'password',
        'payment_status',
    ];

    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public static function generateRegistrationId(): string
    {
        return 'STU-'.str_pad((static::max('id') ?? 0) + 1, 5, '0', STR_PAD_LEFT);
    }
}
