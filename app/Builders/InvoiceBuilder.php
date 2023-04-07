<?php

namespace App\Builders;

use App\Interfaces\InvoiceBuilderInterface;

class InvoiceBuilder implements InvoiceBuilderInterface
{

    public $subtotal=0 ;
    public $discounts= [];
    public $shipping=0 ;

    public function setSubtotal($subtotal)
    {
        $this->subtotal = $subtotal ;
    }
    public function setDiscount($discounts)
    {

        $this->discounts = $discounts ;
    }
    public function setShipping($shipping)
    {
        $this->shipping = $shipping ;
    }
    public function getInvoice()
    {
        $tax = $this->subtotal * (14/100);
        $discountsCollect = collect($this->discounts);
        $total = $this->subtotal + $this->shipping + $tax - $discountsCollect->sum('discount') ;
        $invoice = [
            'subtotal'=>$this->subtotal,
            'shipping'=>$this->shipping,
            'vat'=>$tax,
            'discounts'=>$this->discounts,
            'total'=>$total
        ];

        return $invoice ;
    }

}