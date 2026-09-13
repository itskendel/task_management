<?php

namespace App\Services;

use App\Repositories\ProjectRepository;

class ProjectService
{
    public function __construct(protected ProjectRepository $repository) {}

    public function find(int $id)
    {
        return $this->repository->find($id);
    }

    public function retrieve(?string $search = null, ?array $filter = null)
    {
        return $this->repository->retrieve($search, $filter);
    }

    public function store(array $data)
    {
        return $this->repository->store($data);
    }

    public function update(int $id, array $data)
    {
        return $this->repository->update($this->repository->find($id), $data);
    }

    public function delete(int $id)
    {
        $this->repository->delete($this->repository->find($id));
    }

    public function filter(array $filters)
    {
        return $this->repository->filter($filters);
    }

    public function search(?string $q)
    {
        return $this->repository->search($q);
    }
}
