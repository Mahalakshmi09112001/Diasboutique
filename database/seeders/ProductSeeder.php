<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Floral printed Fashion Saree',
            'description' => 'Rekha Maniyar Women\'s Japan Satin Digital Floral printed Fashion Saree With Blouse Piece',
            'image' => 'saree1.jpg',
            'category_id' => 1, // Linking to 'Saree' category
            'stock' => 100,
            'mrp' => 2199.00,
            'price' => 949.00,
        ]);
    }
}
