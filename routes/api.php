<?php

use App\Http\ApiV1\Modules\Banners\Controllers\BannerController;
use App\Http\ApiV1\Modules\Categories\Controllers\CategoryController;
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

Route::group(['prefix' => 'v1'], function() {
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::post('/categories', [CategoryController::class, 'store']);
    Route::get('/categories/{id}', [CategoryController::class, 'show']);
    Route::put('/categories/{id}', [CategoryController::class, 'replace']);
    Route::patch('/categories/{id}', [CategoryController::class, 'update']);
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

    Route::get('/categories/{categoryId}/banners', [CategoryController::class, 'getBannersAttachedToCategory']);
    Route::post('/categories/{categoryId}/banners', [CategoryController::class, 'attachBannersToCategory']);
    Route::delete('/categories/{categoryId}/banners', [CategoryController::class, 'detachBannersFromCategory']);
});

Route::group(['prefix' => 'v1'], function() {
    Route::get('/banners', [BannerController::class, 'index']);
    Route::post('/banners', [BannerController::class, 'store']);
    Route::get('/banners/{id}', [BannerController::class, 'show']);
    Route::put('/banners/{id}', [BannerController::class, 'replace']);
    Route::patch('/banners/{id}', [BannerController::class, 'update']);
    Route::delete('/banners/{id}', [BannerController::class, 'destroy']);
});
