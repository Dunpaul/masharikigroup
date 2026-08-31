<?php

namespace App\Policies;

use App\Models\User;

class MarketFaqPolicy extends BrandPolicy
{
    protected string $brand = 'market';
}
