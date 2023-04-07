<?php

namespace App\Interfaces;

interface ProductRepositoryInterface 
{
    public function getAllProduct();
    public function getProductById($productId);
    public function deleteProduct($productId);
    public function createProduct(array $productDetails);
    public function updateProduct($productId,array $productDetails);
}