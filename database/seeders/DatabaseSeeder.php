<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        
        $this->call(LaratrustSeeder::class);
        $this->call(ShippingSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(OfferSeeder::class);

        $admin =\App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password'=>Hash::make('123456789')
        ]);
        $admin->addRole('administrator');

        $user =\App\Models\User::factory()->create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password'=>Hash::make('123456789')
        ]);
        $user->addRole('user');
    }
}
