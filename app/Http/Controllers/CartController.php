<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
class CartController extends Controller
{
    //
    public function AddCart(Request $request,$id){
        $product=product::findOrFail($id);
        if($product!=null)
        {
            $oldCart= session('Cart') ? session('Cart'):'';
            $newCart= new Cart($oldCart);
            $newCart->AddCart($product,$id);

            $request->session()->put('Cart',$newCart);
        }
        /* dd($newCart); */
        /* return view('shop.cart',compact('newCart')); */
        return view('shop.shopping-cart',compact('newCart'));

    }

    public function DeleteItemCart(Request $request, $id){
        $oldCart=Session('Cart') ? Session('Cart') : null;
        $newCart=new Cart($oldCart);
        $newCart->DeleteItemCart($id);
        if(Count($newCart->products)>0){
            $request->Session()->put('Cart',$newCart);
        }
        else{
            $request->Session()->forget('Cart');
        }
        return view('shop.shopping-cart',compact('newCart'));
    }

    public function DeleteListItemCart(Request $request, $id){
        $oldCart=Session('Cart') ? Session('Cart') : null;
        $newCart=new Cart($oldCart);
        $newCart->DeleteItemCart($id);
        if(Count($newCart->products)>0){
            $request->Session()->put('Cart',$newCart);
        }
        else{
            $request->Session()->forget('Cart');
        }
        return view('shop.ListCart');
    }
    public function UpdateListItemCart(Request $request, $id,$quanty){
        $product=product::find($id);
        if($product->stock>=$quanty){
            $oldCart=Session('Cart') ? Session('Cart') : null;
            $newCart=new Cart($oldCart);
            if($quanty!=0)
            $newCart->UpdateItemCart($id,$quanty);
            else
            $newCart->DeleteItemCart($id);
            $request->Session()->put('Cart',$newCart); 
        }
        return view('shop.ListCart');
    }

    public function clearAll(){
        session()->forget('Cart');
        return redirect()->back();
    }
}
