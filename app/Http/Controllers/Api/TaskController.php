<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Services\TaskService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends Controller
{
    public function __construct(protected TaskService $task_service) {}

    public function index()
    {
        return $this->task_service->retrieve();
    }

    public function store(StoreTaskRequest $request)
    {
        return $this->task_service->store($request->validated());
    }

    public function show(int $id)
    {
        return $this->task_service->find($id);
    }

    public function update(UpdateTaskRequest $request, int $id)
    {
        return $this->task_service->update($id, $request->validated());
    }

    public function destroy(int $id)
    {
        return $this->task_service->delete($id);
    }

    public function filter(Request $request)
    {
        return $this->task_service->filter($request->only('status_id', 'priority_id'));
    }

    public function search(Request $request)
    {
        return $this->task_service->search($request->input('q'));
    }
}
