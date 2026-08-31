<?php

namespace App\Policies;

use App\Models\User;

class FestivalEditionPolicy extends BrandPolicy
{
    protected string $brand = 'festival';
}
