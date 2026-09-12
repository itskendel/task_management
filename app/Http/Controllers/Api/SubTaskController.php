<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubTaskRequest;
use App\Http\Requests\UpdateSubTaskRequest;
use App\Services\SubTaskService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class SubTaskController extends Controller
{
    public function __construct(protected SubTaskService $service) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return $this->success($this->service->index());
        } catch (\Throwable $th) {
            //throw $th;
            return $this->serverError($th, 'SubTask', null, 'index');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubTaskRequest $request)
    {
        try {
            return $this->success($this->service->store($request->validated()));
        } catch (\Throwable $th) {
            //throw $th;
            return $this->serverError($th, 'SubTask', null, 'store');
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
            return $this->notFound('SubTask not found.', 'SubTask', $id, 'show');
        } catch (\Throwable $th) {
            //throw $th;
            return $this->serverError($th, 'SubTask', $id, 'show');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubTaskRequest $request, int $id)
    {
        try {
            return $this->success($this->service->update($id, $request->validated()));
        } catch (ModelNotFoundException) {
            return $this->notFound('SubTask not found.', 'SubTask', $id, 'update');
        } catch (\Throwable $th) {
            //throw $th;
            return $this->serverError($th, 'SubTask', $id, 'update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try {
            $this->service->destroy($id);

            return $this->success(['message' => 'SubTask deleted successfully.']);
        } catch (ModelNotFoundException) {
            return $this->notFound('SubTask not found.', 'SubTask', $id, 'delete');
        } catch (\Throwable $th) {
            //throw $th;
            return $this->serverError($th, 'SubTask', $id, 'delete');
        }
    }
}
