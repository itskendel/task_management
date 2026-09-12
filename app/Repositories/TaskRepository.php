<?php

namespace App\Repositories;

use App\Models\Task;

class TaskRepository
{
    public function index()
    {
        return Task::all();
    }

    public function store(array $data)
    {
        return Task::create($data);
    }

    public function show(int $id)
    {
        return Task::findOrFail($id);
    }

    public function update(Task $task, array $data)
    {
        return $task->update($data);
    }

    public function destroy(Task $task)
    {
        return $task->delete();
    }
}
