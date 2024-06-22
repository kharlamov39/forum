<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    /**
     * Create a new policy instance.
     */
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function viewAdminDashboard(User $user)
    {
        return $user->isAdmin();
    }
}
