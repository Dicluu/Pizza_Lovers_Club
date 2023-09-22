<?php

namespace App\Policies;

use App\Models\Pizza;
use App\Models\User;

class PizzaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        $available = ['admin'];
        return $this->search($available, $user);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Pizza $pizza): bool
    {
        $available = ['admin'];
        return $this->search($available, $user);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        $available = ['admin'];
        return $this->search($available, $user);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Pizza $pizza): bool
    {
        $available = ['admin'];
        return $this->search($available, $user);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Pizza $pizza): bool
    {
        $available = ['admin'];
        return $this->search($available, $user);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Pizza $pizza): bool
    {
        $available = ['admin'];
        return $this->search($available, $user);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Pizza $pizza): bool
    {
        $available = ['admin'];
        return $this->search($available, $user);
    }

    private function search(array $available, User $user) {
        foreach ($available as $role) {
            $value = $user->roles()->getResults()->pluck('name')->contains($role);
            if ($value > 0) break;
        }
        return $value;
    }
}
