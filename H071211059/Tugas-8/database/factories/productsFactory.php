<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\ja_JP\Person;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\products>
 */
class productsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'productName' => fake()->firstName(),
            'price' => fake()->numberBetween(99, 9999),
            'qty' => fake()->numberBetween(0, 9999),
            'series' => fake()->sentence(5),
            'description' => fake()->sentence(20)
        ];
    }
}
