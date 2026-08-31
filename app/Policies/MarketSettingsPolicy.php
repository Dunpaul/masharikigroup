<?php

namespace App\Policies;

use App\Models\User;

class MarketSettingsPolicy extends BrandPolicy
{
    protected string $brand = 'market';
}
