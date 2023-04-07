<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Offer;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $offers = [
            [
                'describe'      =>'10% off shoes',
                'offer_type'    =>'product',
                'discount_type' =>'percentage',
                'discount'      =>'10',
                'offer'         =>'6',
                'product_id'    =>'6',
            ],
            [
                'describe'      =>'50% off jacket',
                'offer_type'    =>'product',
                'discount_type' =>'percentage',
                'discount'      =>'50',
                'offer'         =>'1',
                'product_id'    =>'5',
            ],
            [
                'describe'      =>'$10 of shipping',
                'offer_type'    =>'shipping',
                'discount_type' =>'fixed',
                'discount'      =>'10',
                'offer'         =>'2',
                'product_id'    =>null,
            ],
            [
                'describe'      =>'50% off jacket',
                'offer_type'    =>'product',
                'discount_type' =>'percentage',
                'discount'      =>'50',
                'offer'         =>'2',
                'product_id'    =>'5',
            ],
        ];
        Offer::insert($offers);
    }
}
