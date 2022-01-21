<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Workspace;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create(Request $request, Workspace $workspace)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'due_date' => 'required',
            'due_time' => 'required',
        ]);

        $task = Task::create([
            'name' => $request->name,
            'due_date' => $request->due_date,
            'due_time' => $request->due_time,
            'workspace_id' => $workspace->id,
            'user_id' => auth()->user()->id,
        ]);

        return back();
    }

    public function update(Task $task)
    {
        $task->update([
            'status' => true,
        ]);

        return back();
    }
}
