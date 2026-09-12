<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PriorityController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\StatusController;
use App\Http\Controllers\Api\SubTaskController;
use App\Http\Controllers\Api\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('api_auth')->group(function () {
    // Resource
    Route::apiResource('/statuses', StatusController::class);
    Route::apiResource('/priorities', PriorityController::class);
    Route::apiResource('/projects', ProjectController::class);
    Route::apiResource('/tasks', TaskController::class);
    Route::apiResource('/sub_tasks', SubTaskController::class);

    // Custom
    Route::get('/projects/filter', [ProjectController::class, 'filter']);
    Route::get('/projects/search', [ProjectController::class, 'search']);

    Route::post('/logout', [AuthController::class, 'logout']);
});
