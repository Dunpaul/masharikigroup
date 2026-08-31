<?php

namespace App\Policies;

use App\Models\User;

class MarketCategoryPolicy extends BrandPolicy
{
    protected string $brand = 'market';
}
