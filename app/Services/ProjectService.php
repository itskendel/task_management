<?php

namespace App\Services;

use App\Models\LogError;
use App\Repositories\ProjectRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;

class ProjectService
{
    public function __construct(protected ProjectRepository $repository) {}

    public function find(int $id)
    {
        try {
            $task = $this->repository->find($id);

            return response()->json($task, 200);
        } catch (ModelNotFoundException) {
            return $this->not_found('show', $id);
        } catch (\Throwable $e) {
            return $this->server_error($e, 'show', $id);
        }
    }

    public function retrieve()
    {
        try {
            return response()->json($this->repository->retrieve(), 200);
        } catch (\Throwable $e) {
            return $this->server_error($e, 'index');
        }
    }

    public function store(array $data)
    {
        try {
            $task = $this->repository->store($data);

            return response()->json($task, 201);
        } catch (\Throwable $e) {
            return $this->server_error($e, 'store');
        }
    }

    public function update(int $id, array $data)
    {
        try {
            $task = $this->repository->update($this->repository->find($id), $data);

            return response()->json($task, 200);
        } catch (ModelNotFoundException) {
            return $this->not_found('update', $id);
        } catch (\Throwable $e) {
            return $this->server_error($e, 'update', $id);
        }
    }

    public function delete(int $id)
    {
        try {
            $this->repository->delete($this->repository->find($id));

            return response()->json(['message' => 'Task deleted successfully.'], 200);
        } catch (ModelNotFoundException) {
            return $this->not_found('destroy', $id);
        } catch (\Throwable $e) {
            return $this->server_error($e, 'destroy', $id);
        }
    }

    public function filter(array $filters)
    {
        try {
            return response()->json($this->repository->filter($filters), 200);
        } catch (\Throwable $e) {
            return $this->server_error($e, 'filter');
        }
    }

    public function search(?string $q)
    {
        try {
            return response()->json($this->repository->search($q), 200);
        } catch (\Throwable $e) {
            return $this->server_error($e, 'search');
        }
    }

    private function not_found(?string $event = null, ?int $model_id = null)
    {
        $message = 'Task not found.';

        $this->log_error('Task', $model_id, $event, $message);

        return response()->json(['message' => $message], 404);
    }

    private function server_error(\Throwable $e, ?string $event = null, ?int $model_id = null)
    {
        $message = 'Something went wrong.';

        $this->log_error('Task', $model_id, $event, $message . ': ' . $e->getMessage());

        return response()->json(['message' => $message], 500);
    }

    private function log_error(string $model, ?int $model_id, ?string $event, string $desc)
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
