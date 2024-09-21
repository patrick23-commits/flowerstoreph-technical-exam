<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::select('id', 'price')->get();
        $user_ids = User::pluck('id')->toArray();

        for($i = 0; $i < 10; $i++) {

            $product = $products->random();            

            DB::table('order_table')->insert(
                [
                    'product_id' => $product->id,
                    'price' => $product->price,
                    'user_id' => $user_ids[array_rand($user_ids)]
                ]
                );
        }

    }
}
