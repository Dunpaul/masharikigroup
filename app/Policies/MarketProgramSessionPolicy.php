<?php

namespace App\Policies;

use App\Models\User;

class MarketProgramSessionPolicy extends BrandPolicy
{
    protected string $brand = 'market';
}
