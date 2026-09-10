<?php

namespace App\Services;

use App\Repositories\TaskRepository;
use Illuminate\Http\Request;

class TaskService
{
    public function __construct(protected TaskRepository $repository) {}

    public function find(int $id)
    {
        return $this->repository->find($id);
    }

    public function retrieve()
    {
        return $this->repository->retrieve();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            ''
        ]);

        $result = $this->repository->store($data);

        if ($result) {
            return;
        }

        return;
    }

    public function update(Request $request, int $id)
    {
        $task = $this->repository->find($id);
        $data = [];
        $result = false;

        if (!$task) {
            $data = $request->validate([]);

            $result = $this->repository->update($task, $data);
        }

        if ($result) {
            return;
        }

        return;
    }

    public function delete(int $id)
    {
        $task = $this->repository->find($id);

        return $this->repository->delete($task);
    }
}
