<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class favorite extends Model
{
    protected $table = 'favorite';
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo('App\Models\product');
    }
}
