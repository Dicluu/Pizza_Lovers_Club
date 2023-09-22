<?php

namespace App\Policies;

use App\Models\Ingredient;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class IngredientPolicy
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
    public function view(User $user, Ingredient $ingredient): bool
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
    public function update(User $user, Ingredient $ingredient): bool
    {
        $available = ['admin'];
        return $this->search($available, $user);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Ingredient $ingredient): bool
    {
        $available = ['admin'];
        return $this->search($available, $user);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Ingredient $ingredient): bool
    {
        $available = ['admin'];
        return $this->search($available, $user);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Ingredient $ingredient): bool
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
