<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\favorite;
use App\Models\notification;
use Illuminate\Support\Facades\View;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $notifications=notification::where('status','=',1)->get();
            View::share('notifications', $notifications);
    }

    public function index()
    {
        $favorite = favorite::where('user_id', auth()->id())->get();
        return view('shop.favorite.favorite', compact('favorite'));
    }

    public function store(product $product)
    {
        favorite::firstOrCreate(['user_id' => auth()->id(), 'product_id' => $product->id]);
        return response()->json(true);
    }

    public function destroy(product $product)
    {
        favorite::where(['user_id' => auth()->id(), 'product_id' => $product->id])->delete();
        return response()->json(true);
    }
}
