<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 1; $i <= 10; $i++) {
            Order::create([
                'customer_id' => $faker->numberBetween(1, 10),
                'order_date' => $faker->date(),
                'status' => $faker->randomElement(['chưa thanh toán', 'đã thanh toán']),
            ]);
        }
    }
}
