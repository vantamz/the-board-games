<?php

namespace App\Http\Controllers;
use App\Models\notification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\View;
use App\Models\product;

class SearchController extends Controller
{
    public function __construct()
    {
            $notifications=notification::where('status','=',1)->get();
            View::share('notifications', $notifications);
    }
    public function search()
    {
        $products = product::where('name', 'like', '%' .request('keyword') . '%')->where('status',1)->get();
        return view('shop.search.search', compact('products'));
    }
}
