<?php


namespace App\Policies\Utils;


use App\Models\User;

class Finder
{

    /**
     *  Looking for role that make action available
     *
     * @param array $available
     * @param User $user
     * @return bool
     */
    public static function search(array $available, User $user) {
        foreach ($available as $role) {
            $value = $user->roles()->getResults()->pluck('name')->contains($role);
            if ($value > 0) break;
        }
        return $value;
    }
}
