<?php

namespace App\Policies;

use App\Models\User;

class FestivalGuestPolicy extends BrandPolicy
{
    protected string $brand = 'festival';
}
