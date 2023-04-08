<?php

namespace App\Repositories ;

use App\Models\Shipping;
use App\Interfaces\ShippingRepositoryInterface;

class ShippingRepository implements ShippingRepositoryInterface
{

    public function getAllShipping()
    {   
        return Shipping::all();
    }
    public function getShippingById($shippingId)
    {
        return Shipping::find($shippingId);
    }
    public function deleteShipping($shippingId)
    {
        $shipping = $this->getShippingById($shipping);
        if(count($shipping->products) > 0)
        {
            return false ;
        }
        Shipping::destroy($shippingId);
        return true;
    }
    public function createShipping(array $shippingDetails)
    {
        return Shipping::create($shippingDetails)->save();
    }
    public function updateShipping($shippingId,array $shippingDetails)
    {
        return Shipping::find($shippingId)->update($shippingDetails);;
    }

}