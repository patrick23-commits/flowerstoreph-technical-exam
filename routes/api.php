<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::post('/v1/product', [ProductController::class, 'add']);
Route::get('/v1/products', [ProductController::class, 'get_all']);
Route::delete('/v1/product/{id}', [ProductController::class, 'delete']);
Route::put('/v1/product/{id}', [ProductController::class, 'update']);
Route::put('/v1/product/{id}/status', [ProductController::class, 'update_status']);

Route::get('/v1/orders', [OrderController::class, 'get_all']);