<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::middleware(['auth:sanctum', 'abilities:admin'])->group(function () {
    Route::apiResource('user', UserController::class);
    Route::apiResource('category', CategoryController::class);
    Route::apiResource('subcategory', SubcategoryController::class);
});

Route::middleware(['auth:sanctum', 'ability:admin,user'])->group(function () {
    Route::apiResource('store', StoreController::class)->middleware(['auth:sanctum', 'ability:admin, user']);
    Route::apiResource('supplier', SupplierController::class)->middleware(['auth:sanctum', 'ability:admin, user']);
    Route::apiResource('item', ItemController::class)->middleware(['auth:sanctum', 'ability:admin, user']);
    Route::apiResource('stock', StockController::class)->middleware(['auth:sanctum', 'ability:admin, user']);
    Route::get('tokens', [UserController::class, 'getTokens']);
    Route::delete('tokens', [UserController::class, 'deleteTokens']);
    Route::delete('tokens/all', [UserController::class, 'clearTokens']);
});



Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
