<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'type'          =>'T-shirt',
                'shipping_id'   =>'1',
                'price'         =>'30.99',
                'weight'        =>'0.2',
            ],
            [
                'type'          =>'Blouse',
                'shipping_id'   =>'2',
                'price'         =>'10.99',
                'weight'        =>'0.3',
            ],
            [
                'type'          =>'Pants',
                'shipping_id'   =>'2',
                'price'         =>'64.99',
                'weight'        =>'0.9',
            ],
            [
                'type'          =>'Sweatpants',
                'shipping_id'   =>'3',
                'price'         =>'84.99',
                'weight'        =>'1.1',
            ],
            [
                'type'          =>'Jacket',
                'shipping_id'   =>'1',
                'price'         =>'199.99',
                'weight'        =>'2.2',
            ],
            [
                'type'          =>'Shoes',
                'shipping_id'   =>'3',
                'price'         =>'79.99',
                'weight'        =>'1.3',
            ]
        ];
        Product::insert($products);
    }
}
