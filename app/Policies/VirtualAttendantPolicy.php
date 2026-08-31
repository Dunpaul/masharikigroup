<?php

namespace App\Policies;

use App\Models\User;

class VirtualAttendantPolicy extends BrandPolicy
{
    protected string $brand = 'market';
}
