<?php

namespace App\Policies;

use App\Models\User;

class MarketSubscriberPolicy extends BrandPolicy
{
    protected string $brand = 'market';
}
