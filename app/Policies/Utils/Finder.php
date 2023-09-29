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
            if ($user->role->name == $role) {
                return true;
            }
        }
        return false;
    }
}
