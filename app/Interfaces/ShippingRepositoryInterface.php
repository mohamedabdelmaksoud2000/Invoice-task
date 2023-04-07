<?php

namespace App\Interfaces;

interface ShippingRepositoryInterface 
{
    public function getAllShipping();
    public function getShippingById($shippingId);
    public function deleteShipping($shippingId);
    public function createShipping(array $shippingDetails);
    public function updateShipping($shippingId,array $shippingDetails);
}