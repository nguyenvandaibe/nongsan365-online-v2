<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->group(function () {

    Route::post('register', [\App\Http\Controllers\Auth\RegisterController::class, 'register']);

    Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');

    Route::post('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])
        ->middleware('auth:sanctum');

    Route::get('categories', [\App\Http\Controllers\Api\Product\CategoryController::class, 'index']);

    Route::apiResource('products', \App\Http\Controllers\Api\Product\ProductController::class)
        ->middleware('auth:sanctum');
});
