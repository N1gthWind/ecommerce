<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();



        foreach ($users as $user) {
            Review::create([
                'user_id' => $user->id,
                'text' => fake()->text(),
                'stars' => fake()->numberBetween(1, 5),
                'product_id' => Product::all()->random()->id,
            ]);
        }
    }
}
