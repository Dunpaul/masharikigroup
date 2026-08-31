<?php

namespace App\Policies;

use App\Models\User;

class FestivalNewsArticlePolicy extends BrandPolicy
{
    protected string $brand = 'festival';
}
