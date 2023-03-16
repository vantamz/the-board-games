<?php

namespace App\Models;

use App\Models\supplier;
use App\Models\promotion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class product extends Model
{
    protected $table='product';
    use HasFactory;

    public function supplierRelation()
    {
        return $this->hasOne('App\Models\supplier', 'id', 'supplier_id');
    }
    public function promotionRelation()
    {
        return $this->hasOne('App\Models\promotion', 'id', 'promotion_id');
    }

    public function productTypeRelation()
    {
        return $this->hasOne('App\Models\productType', 'id', 'product_type_id');
    }
    public function image()
    {
        return $this->hasMany(productImage::class);
    }
}
