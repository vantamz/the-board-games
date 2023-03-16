<?php

namespace App\Http\Controllers;

use App\Models\product;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use App\Models\promotion;
class promotionController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('checkLogin');
    }

    public function index()
    {
        $products=product::where('status',1)->where('promotion_id','!=',1)->get();
        $promotions=promotion::all();
        return view('admin.promotion.promotion',compact('promotions','products'));
    }
    public function store(Request $request)
    {
        $promotion=new promotion();
        $promotion->name=$request->name;
        $promotion->rate=$request->rate;
        $promotion->product_id=$request->productId;
        $promotion->start_date=$request->startDate;
        $promotion->end_date=$request->endDate;
        $promotion->save();
        $products=product::find($request->productId);
        $products->promotion_id=$promotion->id;
        $products->promotion_price=$products->price-($products->price*$request->rate/100);
        $products->save();
        // dd($promotion,$products,$promotion->id);
        return redirect()->back();
    }
}
