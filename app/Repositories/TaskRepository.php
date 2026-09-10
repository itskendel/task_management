<?php

namespace App\Repositories;

use App\Models\Task;
use Exception;
use Illuminate\Support\Facades\DB;

class TaskRepository
{
    public function find(int $id)
    {
        return Task::findOrFail($id);
    }

    public function retrieve()
    {
        return Task::all();
    }

    public function store(array $data)
    {
        try {
            DB::beginTransaction();

            $created_data = Task::create($data);

            DB::commit();

            return true;
        } catch (\Throwable $th) {
            //throw $th;

            DB::rollBack();

            return false;
        }
    }

    public function update(Task $task, array $data)
    {
        try {
            DB::beginTransaction();

            $updated_data = $task->update($data);

            DB::commit();

            return true;
        } catch (\Throwable $th) {
            //throw $th;

            DB::rollBack();

            return false;
        }
    }

    public function delete(Task $task)
    {
        try {
            DB::beginTransaction();

            $task->delete();

            DB::commit();

            return true;
        } catch (\Throwable $th) {
            //throw $th;

            DB::rollBack();

            return false;
        }
    }
}
