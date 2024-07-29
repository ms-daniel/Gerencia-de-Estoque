<?php

use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UsersProfileController;
use App\Http\Controllers\StoreController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('usersprofile', UsersProfileController::class);
Route::apiResource('store', StoreController::class);
Route::apiResource('supplier', SupplierController::class);
