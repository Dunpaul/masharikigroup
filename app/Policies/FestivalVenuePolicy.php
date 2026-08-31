<?php

namespace App\Policies;

use App\Models\User;

class FestivalVenuePolicy extends BrandPolicy
{
    protected string $brand = 'festival';
}
