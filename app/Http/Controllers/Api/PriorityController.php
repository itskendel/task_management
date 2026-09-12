<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePriorityRequest;
use App\Http\Requests\UpdatePriorityRequest;
use App\Services\PriorityService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Throwable;

class PriorityController extends Controller
{
    public function __construct(protected PriorityService $service) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return $this->success($this->service->index());
        } catch (Throwable $e) {
            return $this->serverError($e, 'Priority', null, 'index');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePriorityRequest $request)
    {
        try {
            return $this->success($this->service->store($request->validated()));
        } catch (Throwable $e) {
            return $this->serverError($e, 'Priority', null, 'store');
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
            return $this->notFound('Priority not found.', 'Priority', $id, 'show');
        } catch (Throwable $e) {
            return $this->serverError($e, 'Priority', $id, 'show');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePriorityRequest $request, int $id)
    {
        try {
            return $this->success($this->service->update($id, $request->validated()));
        } catch (ModelNotFoundException) {
            return $this->notFound('Priority not found.', 'Priority', $id, 'update');
        } catch (Throwable $e) {
            return $this->serverError($e, 'Priority', $id, 'update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try {
            $this->service->destroy($id);

            return $this->success(['message' => 'Priority deleted successfully.']);
        } catch (ModelNotFoundException) {
            return $this->notFound('Priority not found.', 'Priority', $id, 'delete');
        } catch (Throwable $e) {
            return $this->serverError($e, 'Priority', $id, 'delete');
        }
    }
}
