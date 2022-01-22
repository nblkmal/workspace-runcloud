<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Workspace;
use Illuminate\Auth\Access\HandlesAuthorization;

class WorkspacePolicy
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

    public function create(User $user)
    {
        return $user;
    }

    public function view(User $user, Workspace $workspace)
    {
        return $user->id === $workspace->user_id;
    }

    public function delete(User $user, Workspace $workspace)
    {
        return $user->id === $workspace->user_id;
    }
}
