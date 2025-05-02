<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/radius/latest', [RadiusController::class, 'latest']);
Route::get('radius/chart', [RadiusController::class, 'getChartData']);
Route::apiResource('/radius', 'App\Http\Controllers\Api\RadiusController');
