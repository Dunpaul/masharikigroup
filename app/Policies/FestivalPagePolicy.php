<?php

namespace App\Policies;

use App\Models\User;

class FestivalPagePolicy extends BrandPolicy
{
    protected string $brand = 'festival';
}
