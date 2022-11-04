<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        $user = \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('asder123'),
            'role' => 'admin'
        ]);

        // $user->wishlist()->create([

        // ]);





        Brand::factory(10)->create();

        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            WishListSeeder::class,
            OrderSeeder::class,
        ]);
    }
}
