<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ["product_name" => "item 1", "product_description" => "description 1"],
            ["product_name" => "item 2", "product_description" => "description 2"],
            ["product_name" => "item 3", "product_description" => "description 3"],
            ["product_name" => "item 4", "product_description" => "description 4"],
            ["product_name" => "item 5", "product_description" => "description 5"]
        ]; 
        for($i = 0; $i < 5; $i++) {
            DB::table('product_table')->insert([
                'product_name' => $items[$i]['product_name'],
                'product_description' => $items[$i]['product_description'],
                'price' => random_int(100, 300),
                'quantity' => random_int(100, 300),
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }  
    }
}
