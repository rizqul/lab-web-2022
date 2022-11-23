<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'book_name' => $this->faker->sentence(3),
            'author' => $this->faker->name,
            'category' => $this->faker->sentence(2),
            'favorable' => $this->faker->numberBetween(0, 1),


        ];
    }
}
