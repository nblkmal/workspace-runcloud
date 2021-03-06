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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/workspace/index', [App\Http\Controllers\WorkspaceController::class, 'index'])->name('workspace:index');
Route::post('/workspace/create', [App\Http\Controllers\WorkspaceController::class, 'create'])->name('workspace:create');
Route::get('/workspace/show/{workspace:uuid}', [App\Http\Controllers\WorkspaceController::class, 'show'])->name('workspace:show');
Route::get('/workspace/delete/{workspace:uuid}', [App\Http\Controllers\WorkspaceController::class, 'delete'])->name('workspace:delete');

Route::post('/task/create/{workspace:uuid}', [App\Http\Controllers\TaskController::class, 'create'])->name('task:create');
Route::get('/task/update/{task:uuid}', [App\Http\Controllers\TaskController::class, 'update'])->name('task:update');
Route::get('/task/delete/{task:uuid}', [App\Http\Controllers\TaskController::class, 'delete'])->name('task:delete');
Route::get('/task/index', [App\Http\Controllers\TaskController::class, 'index'])->name('task:index');