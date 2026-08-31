<?php

namespace App\Policies;

use App\Models\GalleryImage;
use App\Models\User;

/**
 * Unlike other brand-scoped models, GalleryImage is one shared table across
 * all four brands, so the model-class-level BrandPolicy pattern doesn't
 * apply here — a market-admin and a festival-admin both need access to
 * *this* resource, just to different rows. Row-level brand checks here plus
 * the `getEloquentQuery()` scope on GalleryImageResource together keep a
 * section admin from reaching another brand's photos, whether by the index
 * table or by guessing a record's edit URL.
 */
class GalleryImagePolicy
{
    protected function allowedBrand(User $user, string $brand): bool
    {
        return $user->hasRole('super-admin') || $user->can("brand:{$brand}");
    }

    public function viewAny(User $user): bool
    {
        return $user->hasRole('super-admin') || $user->hasAnyRole([
            'group-admin', 'academy-admin', 'market-admin', 'festival-admin',
        ]);
    }

    public function view(User $user, GalleryImage $image): bool
    {
        return $this->allowedBrand($user, $image->brand);
    }

    public function create(User $user): bool
    {
        return $this->viewAny($user);
    }

    public function update(User $user, GalleryImage $image): bool
    {
        return $this->allowedBrand($user, $image->brand);
    }

    public function delete(User $user, GalleryImage $image): bool
    {
        return $this->allowedBrand($user, $image->brand);
    }

    public function deleteAny(User $user): bool
    {
        return $this->viewAny($user);
    }
}
