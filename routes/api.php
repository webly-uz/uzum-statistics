<?php

use App\Http\Controllers\Api\GetCategoriesController;
use App\Http\Controllers\Api\GetCitiesController;
use App\Http\Controllers\Api\GetCityController;
use App\Http\Controllers\Api\GetDeliveryPriceController;
use App\Http\Controllers\Api\GetDeliveryTimeController;
use App\Http\Controllers\Api\GetProductActionBannerController;
use App\Http\Controllers\Api\GetProductController;
use App\Http\Controllers\Api\GetProductReviewsController;
use App\Http\Controllers\Api\GetShopInfoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('uzum')->group(function () {
    Route::get('city', GetCityController::class);
    Route::get('cities', GetCitiesController::class);
    Route::get('categories', GetCategoriesController::class);
    Route::get('delivery-price', GetDeliveryPriceController::class);
    Route::get('delivery-time', GetDeliveryTimeController::class);
    Route::get('shop/{shopName}', GetShopInfoController::class);
    Route::get('products/{productId}', GetProductController::class)->whereNumber('productId');
    Route::get('products/action/{productId}', GetProductActionBannerController::class)->whereNumber('productId');
    Route::get('products/{productId}/reviews', GetProductReviewsController::class)->whereNumber('productId');
});
