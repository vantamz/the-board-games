<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class turtorial extends Model
{
    protected $table="turtorial";
    use HasFactory;
    public function productRelation()
    {
        return $this->belongsTo('App\Models\product','product_id','id');
    }
}
