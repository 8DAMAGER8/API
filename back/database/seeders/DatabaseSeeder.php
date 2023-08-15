<?php

namespace Database\Seeders;

use App\Models\Income;
use App\Models\Order;
use App\Models\Sale;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(500)->create();
        Income::factory()->count(500)->create();
        Sale::factory()->count(500)->create();
        Stock::factory()->count(500)->create();
        Order::factory()->count(500)->create();
    }
}
