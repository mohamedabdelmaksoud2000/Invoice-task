<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAllProduct() 
    {
        return Product::all();
    }
    public function getProductById($productId) 
    {
        return Product::findOrFail($productId);
    }
    public function deleteProduct($productId) 
    {
        Product::destroy($productId);
    }

    public function createProduct(array $productDetails) 
    {
        return Product::create($productDetails);
    }

    public function updateProduct($productId, array $newDetails) 
    {
        return Product::find($productId)->update($newDetails);
    }
}