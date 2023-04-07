<?php

namespace App\Traits ;

use App\Builders\ProductInvoice;

trait InvoiceTrait
{
    public function getInvoiceCarts($products)
    {   
        
        $productInvoice = new productInvoice();
        $productInvoice->setProdcuts($products);
        $invoice=$productInvoice->getInvoice();
        return $invoice ;

    } 
}