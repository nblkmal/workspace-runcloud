<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Task;
use App\Models\Workspace;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create(Request $request, Workspace $workspace)
    {
        $this->authorize('create', Task::class);

        $validated = $request->validate([
            'name' => 'required|max:255',
            'due_date' => 'required',
            'due_time' => 'required',
        ]);

        $task = Task::create([
            'name' => $request->name,
            'task_due' => $request->due_date . $request->due_time,
            'workspace_id' => $workspace->id,
            'user_id' => auth()->user()->id,
        ]);

        return back();
    }

    public function update(Task $task)
    {
        $this->authorize('update', $task);

        $task->update([
            'task_complete' => Carbon::now(),
            'status' => true,
        ]);

        return back();
    }

    public function delete(Task $task)
    {
        $this->authorize('delete', $task);

        $task->delete();

        return back();
    }
}
