<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Nasi Goreng',
            'price_buy' => '10000',
            'price_sell' => '14000',
            'quantity' => '50',
            'rating' => '4.8',
            'category_id' => '1',
        ]);
    }
}
