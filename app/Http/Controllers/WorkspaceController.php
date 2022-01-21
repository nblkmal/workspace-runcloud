<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Workspace;
use Illuminate\Http\Request;

class WorkspaceController extends Controller
{
    public function index()
    {
        $spaces = auth()->user()->workspaces;

        return view('workspace.index', compact('spaces'));
    }

    public function create(Request $request)
    {
        $space = Workspace::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => auth()->user()->id,
        ]);

        return back();
    }

    public function show(Workspace $workspace)
    {
        $incomplete_tasks = $workspace->tasks()->incomplete()->get();
        $complete_tasks = $workspace->tasks()->complete()->get();

        return view('workspace.show', compact('workspace', 'incomplete_tasks', 'complete_tasks'));
    }
}
