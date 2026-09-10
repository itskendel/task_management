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
        return Task::get();
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
}
