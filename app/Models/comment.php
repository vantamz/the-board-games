<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\rating;
class comment extends Model
{
    protected $table='comment';
    use HasFactory;

    public function userRelation(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }
    public function staffRelation(){
        return $this->belongsTo('App\Models\staff','user_id','user_id');
    }
    public function customerRelation(){
        return $this->belongsTo('App\Models\customer','user_id','user_id');
    }
    public function RatingRelation(){
        return $this->hasOne('App\Models\rating','id_comment','id');
    }
}
