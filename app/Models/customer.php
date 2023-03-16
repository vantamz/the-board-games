<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $table ='customer';
    use HasFactory;

    public function userRelation()
    {
        return $this->belongsTo('App\Models\user','user','id');
    }
}
