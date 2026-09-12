<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Services\ProjectService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Throwable;

class ProjectController extends Controller
{
    public function __construct(protected ProjectService $task_service) {}

    public function index()
    {
        try {
            return $this->success($this->task_service->retrieve());
        } catch (Throwable $e) {
            return $this->serverError($e, 'Task', null, 'index');
        }
    }

    public function store(StoreProjectRequest $request)
    {
        try {
            return $this->success($this->task_service->store($request->validated()), 201);
        } catch (Throwable $e) {
            return $this->serverError($e, 'Task', null, 'store');
        }
    }

    public function show(int $id)
    {
        try {
            return $this->success($this->task_service->find($id));
        } catch (ModelNotFoundException) {
            return $this->notFound('Task not found.', 'Task', $id, 'show');
        } catch (Throwable $e) {
            return $this->serverError($e, 'Task', $id, 'show');
        }
    }

    public function update(UpdateProjectRequest $request, int $id)
    {
        try {
            return $this->success($this->task_service->update($id, $request->validated()));
        } catch (ModelNotFoundException) {
            return $this->notFound('Task not found.', 'Task', $id, 'update');
        } catch (Throwable $e) {
            return $this->serverError($e, 'Task', $id, 'update');
        }
    }

    public function destroy(int $id)
    {
        try {
            $this->task_service->delete($id);

            return $this->success(['message' => 'Task deleted successfully.']);
        } catch (ModelNotFoundException) {
            return $this->notFound('Task not found.', 'Task', $id, 'destroy');
        } catch (Throwable $e) {
            return $this->serverError($e, 'Task', $id, 'destroy');
        }
    }

    public function filter(Request $request)
    {
        try {
            return $this->success($this->task_service->filter($request->only('status_id', 'priority_id')));
        } catch (Throwable $e) {
            return $this->serverError($e, 'Task', null, 'filter');
        }
    }

    public function search(Request $request)
    {
        try {
            return $this->success($this->task_service->search($request->input('q')));
        } catch (Throwable $e) {
            return $this->serverError($e, 'Task', null, 'search');
        }
    }
}
