<?php

namespace App\Models;
class Cart
{

    public $products=null;
    public $totalPrice=0;
    public $totalQuanty=0;

    public function __construct($cart){
        if($cart){
            $this->products= $cart->products;
            $this->totalPrice=$cart->totalPrice;
            $this->totalQuanty=$cart->totalQuanty;
        }
    }

    public function AddCart($product, $id){
        $newProduct = ['quanty'=>0,'price'=>$product->price, 'productInfo'=>$product,'promotionPrice'=>$product->promotion_price];
        if($this->products){
            if(array_key_exists($id,$this->products)){
                $newProduct=$this->products[$id];
            }
        }
        $newProduct['quanty']++;
        $newProduct['price']=$newProduct['quanty']*$product->price;
        $this->products[$id]=$newProduct;
        $this->totalPrice+=$product->price-($product->price*$product->promotionRelation->rate/100);
        $this->totalQuanty++;
    }

    public function DeleteItemCart($id){
        $this->totalPrice-=$this->products[$id]['promotionPrice'];
        $this->totalQuanty-=$this->products[$id]['quanty'];
        unset($this->products[$id]);
    }
    
    public function UpdateItemCart($id,$quanty){
        $this->totalPrice-=$this->products[$id]['promotionPrice'];
        $this->totalQuanty-=$this->products[$id]['quanty'];

        $this->products[$id]['quanty']=$quanty;
        $this->products[$id]['promotionPrice']=$quanty*$this->products[$id]['productInfo']->promotion_price;

        $this->totalPrice+=$this->products[$id]['promotionPrice'];
        $this->totalQuanty+=$this->products[$id]['quanty'];

    }
}
?>
