<?php

namespace App\Repositories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;

class ProjectRepository
{
    public function find(int $id)
    {
        return Project::findOrFail($id);
    }

    public function retrieve(?string $search = null, ?array $filter = null)
    {
        $query = Project::query();

        $query->when($search, function ($query) use ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('project_name', 'like', "%{$search}%")
                    ->orWhere('client_name', 'like', "%{$search}%")
                    ->orWhere('desc', 'like', "%{$search}%");
            });
        });

        $query->when($filter, function ($query) use ($filter) {
            $query->when(
                $filter['status_id'] ?? null,
                fn($query, $status_id) => $query->where('status_id', $status_id)
            );

            $query->when(
                $filter['priority_id'] ?? null,
                fn($query, $priority_id) => $query->where('priority_id', $priority_id)
            );
        });

        return $query->oldest('due_date')->paginate(10);
    }

    public function store(array $data)
    {
        return Project::create($data);
    }

    public function update(Project $task, array $data)
    {
        $task->update($data);

        return $task;
    }

    public function delete(Project $task)
    {
        return $task->delete();
    }

    public function filter(array $filters)
    {
        $query = Project::query();

        if (isset($filters['status_id'])) {
            $query->where('status_id', $filters['status_id']);
        }

        if (isset($filters['priority_id'])) {
            $query->where('priority_id', $filters['priority_id']);
        }

        return $query->paginate(10);
    }

    public function search(?string $q)
    {
        return Project::when($q, function ($query, $q) {
            return $query->where(function ($query) use ($q) {
                $query->where('client_name', 'like', "%{$q}%")
                    ->orWhere('project_name', 'like', "%{$q}%")
                    ->orWhere('desc', 'like', "%{$q}%");
            });
        })->paginate(10);
    }
}
