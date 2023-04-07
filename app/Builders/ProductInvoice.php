<?php
    
namespace App\Builders;

use App\Models\Product;

class ProductInvoice
{
    private $builer ;


    public function __construct()
    {
        $this->builder = new InvoiceBuilder() ;
    }

    public function setProdcuts($products)
    {
        if($products)
        {
            $discount = \Discount::getDiscount($products);
            $this->builder->setSubtotal($products->sum('price'));
            $this->builder->setShipping($products->sum('shipping'));
            $this->builder->setDiscount($discount);
        }
    }

    public function getInvoice()
    {
        return $this->builder->getInvoice();
    }
}