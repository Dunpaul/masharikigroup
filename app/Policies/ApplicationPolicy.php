<?php

namespace App\Policies;

use App\Models\User;

class ApplicationPolicy extends BrandPolicy
{
    protected string $brand = 'academy';
}
