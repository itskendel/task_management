<?php

namespace App\Repositories;

use App\Models\Priority;

class PriorityRepository
{
    public function index()
    {
        return Priority::get();
    }

    public function store(array $data)
    {
        return Priority::create($data);
    }

    public function show(int $id)
    {
        return Priority::findOrFail($id);
    }

    public function update(Priority $priority, array $data)
    {
        $priority->update($data);

        return $priority;
    }

    public function destroy(Priority $priority)
    {
        return $priority->delete();
    }
}
