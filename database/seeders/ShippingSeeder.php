<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Shipping;

class ShippingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shippings = [
            [
                'country'   =>'US',
                'rate'      =>'2'  
            ],
            [
                'country'   =>'UK',
                'rate'      =>'3'  
            ],
            [
                'country'   =>'CN',
                'rate'      =>'2'  
            ],
        ];
        Shipping::insert($shippings);
    }
}
