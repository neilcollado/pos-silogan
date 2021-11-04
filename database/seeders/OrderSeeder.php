<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Orders;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Orders::factory()->times(30)->create();
    }
}
