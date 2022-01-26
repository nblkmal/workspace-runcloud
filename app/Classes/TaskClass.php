<?php

namespace App\Classes;

use App\Models\Task;

class TaskClass {
    public function create($request, $workspace)
    {
        $task = Task::create([
            'name' => $request->name,
            'task_due' => $request->due_date . $request->due_time,
            'workspace_id' => $workspace->id,
            'user_id' => auth()->user()->id,
        ]);

        return $task;
    }
}