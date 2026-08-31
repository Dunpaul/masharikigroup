<?php

namespace App\Policies;

use App\Models\User;

/**
 * Managing admins (who gets which brand's access) is a super-admin-only
 * capability — a brand-scoped admin must never be able to grant themselves
 * or anyone else broader access.
 */
class UserPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasRole('super-admin');
    }

    public function view(User $user): bool
    {
        return $user->hasRole('super-admin');
    }

    public function create(User $user): bool
    {
        return $user->hasRole('super-admin');
    }

    public function update(User $user): bool
    {
        return $user->hasRole('super-admin');
    }

    public function delete(User $user, User $target): bool
    {
        return $user->hasRole('super-admin') && ! $user->is($target);
    }

    public function deleteAny(User $user): bool
    {
        return $user->hasRole('super-admin');
    }
}
