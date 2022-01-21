<?php

namespace App\Observers;

use App\Models\Workspace;
use Illuminate\Support\Str;

class WorkspaceObserver
{
    /**
     * Handle the Workspace "created" event.
     *
     * @param  \App\Models\Workspace  $workspace
     * @return void
     */
    public function creating(Workspace $workspace)
    {
        $workspace->uuid = Str::uuid();
    }

    /**
     * Handle the Workspace "updated" event.
     *
     * @param  \App\Models\Workspace  $workspace
     * @return void
     */
    public function updated(Workspace $workspace)
    {
        //
    }

    /**
     * Handle the Workspace "deleted" event.
     *
     * @param  \App\Models\Workspace  $workspace
     * @return void
     */
    public function deleted(Workspace $workspace)
    {
        //
    }

    /**
     * Handle the Workspace "restored" event.
     *
     * @param  \App\Models\Workspace  $workspace
     * @return void
     */
    public function restored(Workspace $workspace)
    {
        //
    }

    /**
     * Handle the Workspace "force deleted" event.
     *
     * @param  \App\Models\Workspace  $workspace
     * @return void
     */
    public function forceDeleted(Workspace $workspace)
    {
        //
    }
}
