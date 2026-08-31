<?php

namespace App\Policies;

use App\Models\User;

class WaiverCodePolicy extends BrandPolicy
{
    protected string $brand = 'market';
}
