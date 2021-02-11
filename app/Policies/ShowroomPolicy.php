<?php

namespace App\Policies;

use App\Models\User;
use App\Models\SR;
use App\Models\Bengkel;
use Illuminate\Auth\Access\HandlesAuthorization;

class ShowroomPolicy
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

    public function update(User $user, SR $sr)
    {
        return $user->id === $sr->user_id;
    }

    public function updateBengkel(User $user, Bengkel $bengkel)
    {
        return $user->id === $sr->user_id;
    }

    public function create(User $user, SR $sr)
    {
        return $user->id === $sr->user_id;
    }    
}
