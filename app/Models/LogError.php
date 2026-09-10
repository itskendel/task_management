<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogError extends Model
{
    //
    protected $fillable = ['model', 'model_id', 'event', 'desc'];
}
