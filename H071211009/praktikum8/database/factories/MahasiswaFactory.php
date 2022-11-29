<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // sesuai kolom (dummy data)
            'NIM' => fake()->phoneNumber(),
            'Nama' =>  fake()->name(),
            'Alamat' =>  fake()->address(),
            'Fakultas' =>  fake()->company(),
        ];
    }
}
