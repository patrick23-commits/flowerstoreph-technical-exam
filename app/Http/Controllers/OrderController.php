<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function get_all() {
        $orders = DB::table('order_table')
                    ->join('product_table', 'order_table.product_id', '=', 'product_table.id')
                    ->select('order_table.*', 'product_table.product_name')
                    ->get();

        return $orders;
    }
}
