<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Spatie\Permission\Models\Role;
class hasRole extends Model
{
    protected $table='model_has_roles';
    use HasFactory;


    public function userRelation()
    {
        return $this->hasOne('App\Models\User','id','model_id');
    }
    public function roleRelation()
    {
        return $this->hasOne('Spatie\Permission\Models\Role','id','role_id');
    }
}
