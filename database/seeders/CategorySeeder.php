<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Saree', 'description' => 'Traditional Indian wear for women'],
            ['name' => 'Lehenga', 'description' => 'Indian traditional bridal wear'],
            ['name' => 'Kurti', 'description' => 'Casual wear for women'],
        ]);
    }
}
