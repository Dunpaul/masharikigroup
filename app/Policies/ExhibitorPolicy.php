<?php

namespace App\Policies;

use App\Models\User;

class ExhibitorPolicy extends BrandPolicy
{
    protected string $brand = 'market';
}
