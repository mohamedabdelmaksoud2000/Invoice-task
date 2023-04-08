<?php

namespace App\Facades;
use Illuminate\Support\Facades\Facade;
use App\Models\Offer;

class Discount
{
    protected $products = null ;

    public function getDiscount($products)
    {
        $this->products = $products;
        $discountDefault= [0 =>[
            'title'=>'not found discount',
            'discount'=> 0 
            ]
        ];
        
        $discountProducts = $this->getDiscountProducts();
        $discountShipping = $this->getDiscountShipping();
        array_push($discountProducts , $discountShipping);     
        return $discountProducts['0'] ? $discountProducts : $discountDefault ; 
    }

    private function getDiscountProducts()
    {
        $dicountOfferProduct=[];
        foreach( $this->products as $product )
        {
            $offersProduct = $product->offers()->orderBy('discount','desc')->get();
            $offer=$this->checkOfferProduct($offersProduct);
            if($offer)
            {
                $discountProduct = $this->getOfferProduct($offer);
                array_push($dicountOfferProduct,$discountProduct);
            }
        }
        
        return $dicountOfferProduct ? $dicountOfferProduct : [];
    }

    private function getOfferProduct($offer)
    {
        $priceProduct = $offer->product->price; 
        return [
            'title' => $offer->describe,
            'discount'=> $offer->getDiscount($priceProduct)
        ];
    }

    private function checkOfferProduct($offersProduct)
    {
        foreach($offersProduct as $offerProduct)
        {
            $check = $this->products->contains($offerProduct->offer);
            if($check)
            {
                return $offerProduct;
            }
        }
        return false ;
    }


    private function getDiscountShipping()
    {
        $offersShipping = Offer::where('offer_type' , 'shipping')->orderBy('discount','desc')->get();
        $offer = $this->checkOfferShipping($offersShipping);
        if($offer)
        {
            return [
                'title'     =>$offer->describe,
                'discount'  =>$offer->getDiscount($this->products->sum('price'))
            ];
        }
    }

    private function checkOfferShipping($offersShipping)
    {
        foreach($offersShipping as $offerShipping)
        {
            if($offerShipping->offer <= $this->products->count())
            {
                return $offerShipping;
            }
        }
        return false ;
    }
}