<?php

namespace App\Models;

use App\Models\supplier;
use App\Models\promotion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class userVoucher extends Model
{
    protected $table='uservoucher';
    use HasFactory;
    
    public function voucher(){
        return $this->belongsTo(voucher::class,'voucher_id','id');
    }
}

