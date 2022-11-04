<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Product::factory(50)->create();

        $urls = [
            'https://placehold.jp/3d4070/ffffff/600x600.png',
        ];

        $products = Product::all();
        foreach ($products as $product) {
            $url = $urls[rand(0, count($urls) - 1)];
            $product
                ->addMediaFromUrl($url)
                ->toMediaCollection('products');
        }
    }
}
