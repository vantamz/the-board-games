<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;
use App\Models\User;

class staff extends Model
{
    use HasFactory;
    protected $table = 'employee';
    public function userRelation()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    // vantam add

}
