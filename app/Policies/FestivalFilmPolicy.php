<?php

namespace App\Policies;

use App\Models\User;

class FestivalFilmPolicy extends BrandPolicy
{
    protected string $brand = 'festival';
}
