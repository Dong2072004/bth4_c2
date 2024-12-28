<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order_detail;
use Faker\Factory as Faker;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 1; $i <= 10; $i++) {
            Order_detail::create([
                'order_id' => $faker->numberBetween(1, 10),
                'product_id' => $faker->numberBetween(1, 10),
                'quantity' => $faker->numberBetween(1, 10),
            ]);
        }
    }
}
