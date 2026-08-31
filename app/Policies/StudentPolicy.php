<?php

namespace App\Policies;

use App\Models\User;

class StudentPolicy extends BrandPolicy
{
    protected string $brand = 'market';
}
