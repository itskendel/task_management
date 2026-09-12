<?php

namespace App\Repositories;

use App\Models\SubTask;

class SubTaskRepository
{
    public function index()
    {
        return SubTask::all();
    }

    public function store(array $data)
    {
        return SubTask::create($data);
    }

    public function show(int $id)
    {
        return SubTask::findOrFail($id);
    }

    public function update(SubTask $sub_task, array $data)
    {
        return $sub_task->update($data);
    }

    public function destroy(SubTask $sub_task)
    {
        return $sub_task->delete();
    }
}
