<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class invoice extends Model
{
    protected $table='invoice';
    use HasFactory;

    public function details()
    {
        return $this->hasMany('App\Models\invoiceDetail', 'invoice_id');
    }

    public function getProductText()
    {
        $text = $this->details[0]->product->name;
        if ($this->details->count() > 1) {
            $text = $this->details->count() - 1;
        }
        return $text;
    }

    public function getCustomer()
    {
        return $this->belongsTo('App\Models\customer','customer_id','id');
    }

}
