<?php

namespace App\Services;

use App\Repositories\TaskRepository;

class TaskService
{
    public function __construct(protected TaskRepository $repository) {}

    public function index()
    {
        return $this->repository->index();
    }

    public function store(array $data)
    {
        return $this->repository->store($data);
    }

    public function show(int $id)
    {
        return $this->repository->show($id);
    }

    public function update(int $id, array $data)
    {
        return $this->repository->update($this->repository->show($id), $data);
    }

    public function destroy(int $id)
    {
        return $this->repository->destroy($this->repository->show($id));
    }
}
