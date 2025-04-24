<?php

namespace Database\Seeders;

use App\Models\Computers;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 100) as $index) {
            Computers::create([
                'brand' => $faker->company,
                'model' => $faker->word,
                'processor' => $faker->word,
                'ram' => $faker->numberBetween(2, 32),
                'graphics_card' => $faker->word,
                'storage' => $faker->word,
                'operating_system' => $faker->word,
                'screen_size' => $faker->randomFloat(2, 10, 32),
                'price' => $faker->randomFloat(2, 200, 2000),
            ]);
        }
    }
}
