<?php

namespace App\Classes;

use App\Models\Workspace;

class WorkspaceClass 
{
    public function create($request)
    {
        $space = Workspace::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => auth()->user()->id,
        ]);

        return $space;
    }
}