<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use App\Models\WishList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WishListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $products = Product::all();
        $users = User::pluck('id');
        for ($i = 0; $i < 10; $i++) {
            WishList::create([
                'user_id' =>   User::pluck('id')->random(),
                'product_id' => $products->random()->id
            ]);

        }
    }
}
