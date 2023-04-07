<?php

namespace App\Traits;
use App\Models\Product;

trait Cart 
{

    public function getCarts()
    {
        $carts = session()->get('cart');
        if($carts){
            $products = Product::whereIn('id',array_keys($carts))->get();
        }else{
            $products = null;
        }
        return $products;  
    }



    public function addCart(Product $product)
    {
        
        $cart = session()->get('cart',[]);

        $cart[$product->id]=[
            'id'        => $product->id,
            'name'      => $product->name,
        ];
        
        session()->put('cart',$cart);

        return true ;
    }


    public function removeCart(Product $product)
    {
        
        $cart = session()->get('cart');

        if(isset($cart[$product->id])){
        
            unset($cart[$product->id]);
            session()->put('cart',$cart);

        }
        return true ;
    }

    public function destroyCarts()
    {
        session()->forget('cart');
        return true ;
    }

    public function checkCart(Product $product)
    {
        $cart = session()->get('cart');
        if(isset($cart[$product->id])){
            return true ;
        }
        else{
            return false ;
        }
    }
}