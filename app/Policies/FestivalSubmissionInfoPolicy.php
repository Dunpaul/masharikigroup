<?php

namespace App\Policies;

use App\Models\User;

class FestivalSubmissionInfoPolicy extends BrandPolicy
{
    protected string $brand = 'festival';
}
