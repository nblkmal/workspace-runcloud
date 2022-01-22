<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $incomplete_tasks = auth()->user()->tasks()->incomplete()->count();
        $complete_tasks = auth()->user()->tasks()->complete()->count();
        $workspaces = auth()->user()->workspaces->count();

        return view('home', compact('incomplete_tasks', 'complete_tasks', 'workspaces'));
    }
}
