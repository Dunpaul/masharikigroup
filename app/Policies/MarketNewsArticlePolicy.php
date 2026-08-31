<?php

namespace App\Policies;

use App\Models\User;

class MarketNewsArticlePolicy extends BrandPolicy
{
    protected string $brand = 'market';
}
