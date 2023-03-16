<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productType;
use GuzzleHttp\Middleware;

class productTypeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('checkLogin');
    }
    public function index(){
        $productTypes=productType::where('status',1)->get();
        return view('admin.product.productType',compact('productTypes'));
    }

    public function edit($id){
        $ProductTypeSingle=productType::findOrFail($id);
        $productTypes=productType::all();
        return view('admin.product.productType',compact('productTypes','ProductTypeSingle'));
    }

    public function store(Request $request){

        $productTypes= new productType();
        $productTypes->product_type_name=$request->product_type_name;
        $productTypes->save();
        toast('Product type created','success');
        return redirect()->route('productType-index');
    }
    public function update(Request $request,$id){
        $productType= productType::findOrFail($id);
        $productType->product_type_name=$request->product_type_name;
        $productType->save();
        toast('Product type updated','success');
        return redirect()->route('productType-index');
    }

    public function destroy(Request $request){
        $productType= productType::findOrFail($request->productTypeId);
        $productType->status=0;
        $productType->save();
        toast('Product type status updated','success');
        return redirect()->route('productType-index');
    }
}
