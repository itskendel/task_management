<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = ['project_id', 'status_id', 'priority_id', 'name', 'desc', 'due_date'];
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

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function sub_tasks()
    {
        return $this->hasMany(SubTask::class);
    }
}
