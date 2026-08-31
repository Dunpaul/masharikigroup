<?php

namespace App\Policies;

use App\Models\User;

class FestivalScreeningPolicy extends BrandPolicy
{
    protected string $brand = 'festival';
}
