<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $price = fake()->randomFloat(2, 5, 150);

        return [
            'category_id' => Category::all()->random()->id,
            'name' => fake()->title(),
            'slug' => fake()->slug(),
            'brand_id' => Brand::all()->random()->id,
            'description' => fake()->text(),
            'price' => $price,
            'quantity' => fake()->numberBetween(1, 25),
            'discount_price' => function () use ($price) {
                if (fake()->boolean()) {
                    return $price - (fake()->randomFloat(2, 0, 1) * $price);
                }
            },
            'status' => fake()->boolean(),
            'trending' => fake()->boolean(),
            'meta_title' => fake()->text(),

        ];
    }
}
