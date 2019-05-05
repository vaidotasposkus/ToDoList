<?php

namespace Laravel\Todolist\Model;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'task';

    protected $fillable = [
        'name',
    ];
}
