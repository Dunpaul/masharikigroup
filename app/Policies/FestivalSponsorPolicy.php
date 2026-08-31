<?php

namespace App\Policies;

use App\Models\User;

class FestivalSponsorPolicy extends BrandPolicy
{
    protected string $brand = 'festival';
}
