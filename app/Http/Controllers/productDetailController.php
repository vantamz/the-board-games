<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class productDetailController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('checkLogin');
    }


}
