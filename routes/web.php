<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SubTaskController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', fn() => view('pages.dashboard'));

Route::resource('/projects', ProjectController::class);
Route::resource('/tasks', TaskController::class);
Route::resource('/sub_tasks', SubTaskController::class);
