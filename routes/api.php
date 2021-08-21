<?php

use Illuminate\Http\Request;
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

Route::group(['prefix' => 'v1', 'as' => 'api.v1.'], function () {

    Route::group(['prefix' => 'seller', 'as' => 'seller.'], function () {

        Route::post('products/{product}/growth', [\App\Http\Controllers\Api\ProductController::class, 'storeGrowth'])
            ->name('products.growth.store');
    });
});
