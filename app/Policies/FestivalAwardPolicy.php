<?php

namespace App\Policies;

use App\Models\User;

class FestivalAwardPolicy extends BrandPolicy
{
    protected string $brand = 'festival';
}
