<?php

use App\Http\Controllers\CompletedTasksController;
use App\Http\Controllers\CompleteTaskController;
use App\Http\Controllers\PendingTasksController;
use App\Http\Controllers\TaskController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/tasks/completed', CompletedTasksController::class)->name('tasks.completed');
    Route::get('/tasks/pending', PendingTasksController::class)->name('tasks.pending');

    Route::resource('tasks', TaskController::class);

    Route::post('/tasks/{task}/complete', [CompleteTaskController::class, 'store']);
    Route::delete('/tasks/{task}/complete', [CompleteTaskController::class, 'destroy']);
});
