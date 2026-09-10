<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['status_id', 'priority_id', 'client_name', 'project_name', 'desc', 'start_date', 'due_date'];
}
