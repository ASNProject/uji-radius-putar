<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RadiusController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('radius')->controller(RadiusController::class)->group(function () {
    Route::get('/latest', 'latest');
    Route::get('/chart', 'getChartData');
});
Route::apiResource('/radius', 'App\Http\Controllers\Api\RadiusController');
