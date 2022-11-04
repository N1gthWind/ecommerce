<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $statuses = ['COMPLETED', 'NOT_COMPLETED'];

        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'paid_amount' => $this->faker->randomFloat(2, 0, 100),
            'payment_id' => $this->faker->uuid,
            'status' => $statuses[$this->faker->numberBetween(0, 1)],
            'created_at' => $this->faker->dateTimeBetween('-2 week', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-2 week', 'now'),
        ];
    }
}
