<?php

namespace App\Repositories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

class TaskRepository
{
    public function find(int $id)
    {
        return Task::findOrFail($id);
    }

    public function retrieve()
    {
        return Task::paginate(10);
    }

    public function store(array $data)
    {
        return Task::create($data);
    }

    public function update(Task $task, array $data)
    {
        $task->update($data);

        return $task;
    }

    public function delete(Task $task)
    {
        return $task->delete();
    }

    public function filter(array $filters)
    {
        $query = Task::query();

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
        return Task::when($q, function ($query, $q) {
            return $query->where(function ($query) use ($q) {
                $query->where('client_name', 'like', "%{$q}%")
                    ->orWhere('project_name', 'like', "%{$q}%")
                    ->orWhere('desc', 'like', "%{$q}%");
            });
        })->paginate(10);
    }
}
