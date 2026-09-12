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
}
