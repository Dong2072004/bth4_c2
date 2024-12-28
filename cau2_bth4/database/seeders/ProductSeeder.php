<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 1; $i <= 10; $i++) {
            Product::create([
                'name' => $faker->word,
                'description' => $faker->paragraph,
                'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
                'quantity' => $faker->randomNumber(2),
            ]);
        }
    }
}
