<?php

namespace App\Services;

use App\Models\LogError;
use App\Repositories\PriorityRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PriorityService
{
    public function __construct(protected PriorityRepository $repository) {}

    public function index()
    {
        try {
            return response()->json($this->repository->index(), 200);
        } catch (\Throwable $th) {
            return $this->server_error($th, 'index');
        }
    }

    public function store(array $data)
    {
        try {
            $status = $this->repository->store($data);

            return response()->json($status, 200);
        } catch (\Throwable $th) {
            return $this->server_error($th, 'store');
        }
    }

    public function show(int $id)
    {
        try {
            $task = $this->repository->show($id);

            return response()->json($task, 200);
        } catch (ModelNotFoundException) {
            return $this->not_found('show', $id);
        } catch (\Throwable $th) {
            return $this->server_error($th, 'show', $id);
        }
    }

    public function update(int $id, array $data)
    {
        try {

            $status = $this->repository->update($this->repository->show($id), $data);

            return response()->json($status, 200);
        } catch (ModelNotFoundException) {
            return $this->not_found('update', $id);
        } catch (\Throwable $th) {
            return $this->server_error($th, 'update', $id);
        }
    }

    public function destroy(int $id)
    {
        try {
            $this->repository->destroy($this->repository->show($id));

            return response()->json(['message' => 'Priority deleted successfully.'], 200);
        } catch (ModelNotFoundException) {
            return $this->not_found('delete', $id);
        } catch (\Throwable $th) {
            //throw $th;

            return $this->server_error($th, 'update', $id);
        }
    }

    private function not_found(?string $event = null, ?int $model_id = null)
    {
        $message = 'Priority not found.';

        $this->log_error('Priority', $model_id, $event, $message);

        return response()->json(['message' => $message], 404);
    }

    private function server_error(\Throwable $e, ?string $event = null, ?int $model_id = null)
    {
        $message = 'Something went wrong.';

        $this->log_error('Priority', $model_id, $event, $message . ': ' . $e->getMessage());

        return response()->json(['message' => $message], 500);
    }

    private function log_error(string $model, ?int $model_id, ?string $event, string $desc): void
    {
        try {
            LogError::create([
                'model' => $model,
                'model_id' => $model_id,
                'event' => $event,
                'desc' => $desc,
            ]);
        } catch (\Throwable) {
        }
    }
}
