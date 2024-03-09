<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            "name" => "dell",
            "desc" => "lorem ipsum dolor sit amet, consectetur adip",
            "price" => 19000,
            "image" => "products/2.png",
            "quantity" => 40,
            "category_id" => 2
        ]);
    }
}
