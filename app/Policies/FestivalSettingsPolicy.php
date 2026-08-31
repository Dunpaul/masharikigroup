<?php

namespace App\Policies;

use App\Models\User;

class FestivalSettingsPolicy extends BrandPolicy
{
    protected string $brand = 'festival';
}
