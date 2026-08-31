<?php

namespace App\Policies;

use App\Models\User;

class FestivalProgramPolicy extends BrandPolicy
{
    protected string $brand = 'festival';
}
