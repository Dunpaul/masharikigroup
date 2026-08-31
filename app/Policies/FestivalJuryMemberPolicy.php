<?php

namespace App\Policies;

use App\Models\User;

class FestivalJuryMemberPolicy extends BrandPolicy
{
    protected string $brand = 'festival';
}
