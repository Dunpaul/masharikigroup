<?php

namespace App\Policies;

use App\Models\User;

class NonExhibitorPolicy extends BrandPolicy
{
    protected string $brand = 'market';
}
