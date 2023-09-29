<?php

namespace App\Policies;

use App\Models\PurchaseOrderTask;
use App\Models\User;
use App\Policies\Utils\Finder;
use Illuminate\Auth\Access\Response;

class PurchaseOrderTaskPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        $available = ['admin', 'manager', 'courier', 'cooker'];
        return Finder::search($available, $user);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user): bool
    {
        $available = ['admin'];
        return Finder::search($available, $user);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PurchaseOrderTask $task): bool
    {
        $statusId = $task->order->status->id;
        if (!$task->employee || $task->employee->id == $user->id ) {
            if ($statusId >= 2
            && $statusId <= 3
            && $user->role->id === 3) {
                return true;
            }
            if ($statusId >= 4
                && $statusId <= 6
                && $user->role->id === 4) {
                return true;
            }
        }
        return $user->role->id === 5 || $user->role->id === 2;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PurchaseOrderTask $purchaseOrderTask): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PurchaseOrderTask $purchaseOrderTask): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PurchaseOrderTask $purchaseOrderTask): bool
    {
        //
    }
}
