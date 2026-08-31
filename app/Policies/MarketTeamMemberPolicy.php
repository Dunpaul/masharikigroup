<?php

namespace App\Policies;

use App\Models\User;

class MarketTeamMemberPolicy extends BrandPolicy
{
    protected string $brand = 'market';
}
