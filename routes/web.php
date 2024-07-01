<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/firstpage', [ProductController::class, '']);

// Route::get('/product/create/{id?}', [ProductController::class, 'create']);

// Route::get('/product', [ProductController::class, 'index']);

// Route::get('/product/delete', [ProductController::class, 'delete']);

Route::apiResource('categories', CategoryController::class);
Route::apiResource('products', ProductController::class);
Route::apiResource('suppliers', SupplierController::class);

// Rotas para gerenciar a relação entre produtos e fornecedores
Route::post('products/{product}/suppliers', [ProductController::class, 'attachSupplier']);
Route::delete('products/{product}/suppliers/{supplier}', [ProductController::class, 'detachSupplier']);


