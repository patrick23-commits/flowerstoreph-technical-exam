<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function add(Request $request) {
        $validated =  $request->validate(
            [
                'product_name' => ['required'],
                'product_description' => ['required'],
                'price' => ['required'],
                'quantity' => ['required']
            ]
            );
        $validated['status'] = 1;
        return ["status" => 1, "product" => Product::create($validated)];
    }

    public function get_all(Request $request) {
        return Product::all();
    }

    public function delete($id) {
        $product = Product::find($id);

        $product->delete();

        return 1;
    }

    public function update(Request $request, $id) {

        $validated =  $request->validate(
            [
                'product_name' => ['required'],
                'product_description' => ['required'],
                'price' => ['required'],
                'quantity' => ['required']
            ]
            );
        
        $product = Product::find($id);

        $product->update($request->all());

        return 1;
    }

    public function update_status(Request $request, $id) {

        $validated =  $request->validate(
            [
                'status' => ['required']
            ]
            );
        
        $product = Product::find($id);
        $product->update($request->all());
        return 1;
    }
} 
