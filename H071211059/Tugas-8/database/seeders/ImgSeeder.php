<?php

namespace Database\Seeders;

use App\Models\imagesrc;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImgSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        imagesrc::factory(3000)->create();
    }
}
