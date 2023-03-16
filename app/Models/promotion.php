<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class promotion extends Model
{
    protected $table='promotion';
    use HasFactory;
    
    public function productRelation()
    {
        return $this->hasOne('App\Models\product', 'id', 'product_id');
    }
}
