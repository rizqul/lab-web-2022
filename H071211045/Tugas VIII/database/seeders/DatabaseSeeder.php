<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Book::factory(1000)->create();

        // Book::factory()->create([
        //     'book_name' => 'Test Book',
        //     'author' => 'Test Author',
        //     'category' => 'Test Category',
        //     'favorable' => 1,
        // ]);
    }
}
