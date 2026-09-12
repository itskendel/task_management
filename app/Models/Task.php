<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = ['project_id', 'status_id', 'priority_id', 'name', 'desc', 'due_date'];
    protected $appends = ['status', 'priority'];
}
