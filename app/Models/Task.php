<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    protected $fillable = ['status_id', 'priority_id', 'client_name', 'project_name', 'desc', 'start_date', 'due_date'];
    protected $appends = ['status', 'priority'];
    protected $hidden = ['status_model', 'priority_model'];

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
}
