<?php

namespace App\Repositories;

use App\Models\Status;

class StatusRepository
{
    public function index()
    {
        return Status::paginate(10);
    }

    public function store(array $data)
    {
        return Status::create($data);
    }

    public function show(int $id)
    {
        return Status::findOrFail($id);
    }

    public function update(Status $status, array $data)
    {
        $status->update($data);

        return $status;
    }

    public function destroy(Status $status)
    {
        return $status->delete();
    }
}
