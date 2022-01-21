<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/workspace/index', [App\Http\Controllers\WorkspaceController::class, 'index'])->name('workspace:index');
Route::post('/workspace/create', [App\Http\Controllers\WorkspaceController::class, 'create'])->name('workspace:create');
Route::get('/workspace/show/{workspace}', [App\Http\Controllers\WorkspaceController::class, 'show'])->name('workspace:show');

Route::post('/task/create/{workspace}', [App\Http\Controllers\TaskController::class, 'create'])->name('tasks:create');
Route::get('/task/update/{task}', [App\Http\Controllers\TaskController::class, 'update'])->name('tasks:update');