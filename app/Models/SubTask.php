<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubTask extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['task_id', 'user_id', 'status_id', 'priority_id', 'name', 'desc', 'due_date'];
    protected $appends = ['status', 'priority'];

    public function status_model()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function priority_model()
    {
        return $this->belongsTo(Priority::class, 'priority_id');
    }

    public function getStatusAttribute()
    {
        return $this->status_model?->name;
    }

    public function getPriorityAttribute()
    {
        return $this->priority_model?->name;
    }

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }
}
