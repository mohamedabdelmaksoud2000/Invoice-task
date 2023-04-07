<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Traits\Cart;
use App\Traits\InvoiceTrait;

class HomeController extends Controller
{
    use Cart ,  InvoiceTrait ;

    public function getProducts()
    {
        $products = Product::all();
        return view('welcome',compact('products'));
    }

    public function getInvoice()
    {

        $products = $this->getCarts();   
        $invoice = $this->getInvoiceCarts($products);
        return view('invoice',compact('invoice'));
    }



}
