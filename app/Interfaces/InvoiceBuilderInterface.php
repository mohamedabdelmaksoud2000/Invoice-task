<?php

namespace App\Interfaces ;
use App\Models\Product;

interface InvoiceBuilderInterface {

    public function setSubtotal($price);
    public function setDiscount($discount);
    public function setShipping($shipping);
    public function getInvoice();

}