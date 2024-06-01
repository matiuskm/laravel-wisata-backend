<?php

use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', 'App\Http\Controllers\Api\AuthController@logout');
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::apiResource('/products', ProductController::class);
    Route::apiResource('/categories', 'App\Http\Controllers\Api\CategoryController');
    Route::apiResource('/orders', 'App\Http\Controllers\Api\OrderController');
});

// login
Route::post('/login', 'App\Http\Controllers\Api\AuthController@login');
