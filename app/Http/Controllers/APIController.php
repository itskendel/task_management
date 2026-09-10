<?php

namespace App\Http\Controllers;

use App\Services\TaskService;
use Illuminate\Http\Request;

class APIController extends Controller
{
    protected TaskService $task_service;

    public function __construct() {}

    public function store_task(Request $request)
    {
        return $this->task_service->store($request);
    }

    public function update_task(Request $request, int $id)
    {
        return $this->task_service->update($request, $id);
    }

    public function destroy_task(int $id)
    {
        return $this->task_service->delete($id);
    }
}
