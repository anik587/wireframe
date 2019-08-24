<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    protected $table = 'todolist';
    protected $fillable = [
        'name', 'type', 'status', 'priority_level'
    ];
}
