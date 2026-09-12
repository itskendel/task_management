<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PriorityController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\StatusController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('api_authentication')->group(function () {
    Route::get('/tasks/filter', [ProjectController::class, 'filter']);
    Route::get('/tasks/search', [ProjectController::class, 'search']);
    Route::apiResource('/tasks', ProjectController::class);
    Route::apiResource('/statuses', StatusController::class);
    Route::apiResource('/priorities', PriorityController::class);

    Route::post('/logout', [AuthController::class, 'logout']);
});
