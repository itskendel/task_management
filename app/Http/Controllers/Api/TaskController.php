<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Services\TaskService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct(protected TaskService $service) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return $this->success($this->service->index());
        } catch (\Throwable $th) {
            return $this->serverError($th, 'Task', null, 'index');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        try {
            return $this->success($this->service->store($request->validated()));
        } catch (\Throwable $th) {
            return $this->serverError($th, 'Task', null, 'store');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        try {
            return $this->success($this->service->show($id));
        } catch (ModelNotFoundException) {
            return $this->notFound('Task not found.', 'Task', $id, 'show');
        } catch (\Throwable $th) {
            return $this->serverError($th, 'Task', $id, 'show');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, int $id)
    {
        try {
            return $this->success($this->service->update($id, $request->validated()));
        } catch (ModelNotFoundException) {
            return $this->notFound('Task not found.', 'Task', $id, 'update');
        } catch (\Throwable $th) {
            return $this->serverError($th, 'Task', $id, 'update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try {
            $this->service->destroy($id);

            return $this->success(['message' => 'Task deleted successfully.']);
        } catch (ModelNotFoundException) {
            return $this->notFound('Task not found.', 'Task', $id, 'delete');
        } catch (\Throwable $th) {
            return $this->serverError($th, 'Task', $id, 'delete');
        }
    }
}
