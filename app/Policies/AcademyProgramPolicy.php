<?php

namespace App\Policies;

use App\Models\User;

class AcademyProgramPolicy extends BrandPolicy
{
    protected string $brand = 'academy';
}
