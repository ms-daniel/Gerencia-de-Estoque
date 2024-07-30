<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UsersProfileController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('usersprofile', UsersProfileController::class);
Route::apiResource('store', StoreController::class);
Route::apiResource('supplier', SupplierController::class);
Route::apiResource('item', ItemController::class);
Route::apiResource('category', CategoryController::class);
Route::apiResource('subcategory', SubcategoryController::class);
Route::apiResource('stock', StockController::class);
