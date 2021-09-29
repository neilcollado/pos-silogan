<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['CategoryName' => 'Silog'],
            ['CategoryName' => 'Beverages'],
            ['CategoryName' => 'Add-On'],
        ]);
    }
}
