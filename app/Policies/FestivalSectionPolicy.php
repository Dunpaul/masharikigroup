<?php

namespace App\Policies;

use App\Models\User;

class FestivalSectionPolicy extends BrandPolicy
{
    protected string $brand = 'festival';
}
