<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class invoiceDetail extends Model
{
    protected $table='invoice_detail';
    use HasFactory;

    public function product()
    {
        return $this->belongsTo('App\Models\product', 'product_id');
    }
    public function invoice()
    {
        return $this->belongsTo('App\Models\invoice', 'invoice_id');
    }
}
