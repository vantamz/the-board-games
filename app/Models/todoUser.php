<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class todoUser extends Model
{
    protected $table='todouser';
    use HasFactory;
    public function todoListRelation(){
        //return $this->belongsTo(todoList::class);
        return $this->belongsTo('App\Models\todoList','todo_id','id');
    }
    public function userRelation()
    {
        return $this->belongsTo('App\Models\staff','user_id','id');
    }
}
