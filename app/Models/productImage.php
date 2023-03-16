<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productImage extends Model
{
    protected $table='product_image';
    use HasFactory;
    protected $fillable =[
        'id_product',
        'image',
    ];

    public function product(){
        return $this->belongsTo(product::class);
    }
}
