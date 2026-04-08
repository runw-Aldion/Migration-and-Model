<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\GreetController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('tasks', TaskController::class);

Route::get('/greet', [GreetController::class, 'index']);
// for task status
Route::patch('/tasks/{task}/toggle', [TaskController::class, 'toggle'])->name('tasks.toggle');