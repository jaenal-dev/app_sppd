<?php

namespace App\Policies;

use App\Models\Nppd;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function read(User $user, Nppd $nppd)
    {
        return $user->role == 1;
    }

    public function create(User $user, Nppd $nppd)
    {
        return $user->role == 1;
    }

    public function edit(User $user, Nppd $nppd)
    {
        return $user->role == 1;
    }

    public function delete(User $user, Nppd $nppd)
    {
        return $user->role == 1;
    }
}
