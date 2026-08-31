<?php

namespace App\Policies;

use App\Models\User;

/**
 * Every brand-scoped model (Festival*, Market*, academy_* tables) lives in
 * its own tables — there is no shared multi-brand table to filter with a
 * WHERE clause. Gating the whole model class on the brand permission is
 * therefore a real access boundary: a festival-only admin who guesses a
 * MarketFaq URL is denied here, before any query runs, not just kept off
 * the menu. (GalleryImage is the one exception — see GalleryImagePolicy,
 * which scopes by row instead since that table is shared across brands.)
 */
abstract class BrandPolicy
{
    protected string $brand;

    protected function allowed(User $user): bool
    {
        return $user->hasRole('super-admin') || $user->can("brand:{$this->brand}");
    }

    public function viewAny(User $user): bool
    {
        return $this->allowed($user);
    }

    public function view(User $user): bool
    {
        return $this->allowed($user);
    }

    public function create(User $user): bool
    {
        return $this->allowed($user);
    }

    public function update(User $user): bool
    {
        return $this->allowed($user);
    }

    public function delete(User $user): bool
    {
        return $this->allowed($user);
    }

    public function deleteAny(User $user): bool
    {
        return $this->allowed($user);
    }

    public function forceDelete(User $user): bool
    {
        return $this->allowed($user);
    }

    public function restore(User $user): bool
    {
        return $this->allowed($user);
    }
}
