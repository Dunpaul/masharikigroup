<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NonExhibitor extends Model
{
    protected $fillable = [
        'registration_id',
        'company_contact_first_name',
        'company_contact_last_name',
        'company_contact_phone',
        'company_contact_email',
        'designation',
        'attending_as',
        'company_contact_alt_first_name',
        'company_contact_alt_last_name',
        'company_contact_alt_phone',
        'company_contact_alt_email',
        'company_name',
        'company_address',
        'company_phone',
        'company_email',
        'company_website',
        'company_services',
        'company_services_exhibited',
        'company_provisions',
        'company_products',
        'company_products_other',
        'password',
        'payment_status',
        'amount',
        'currency',
        'payment_reference',
        'flutterwave_transaction_id',
        'paid_at',
    ];

    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return [
            'company_provisions' => 'array',
            'company_products' => 'array',
            'password' => 'hashed',
            'paid_at' => 'datetime',
        ];
    }

    public static function generateRegistrationId(): string
    {
        return 'NEX-'.str_pad((static::max('id') ?? 0) + 1, 5, '0', STR_PAD_LEFT);
    }
}
