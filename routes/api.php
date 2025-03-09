<?php

use App\Http\Controllers\RouteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/find-bus', [BusController::class, 'find_bus']);
Route::apiResource('routes', RouteController::class);
Route::post('routes/{id}/stops', [RouteController::class, 'addStop']);
Route::delete('routes/{id}/stops/{stop_id}', [RouteController::class, 'removeStop']);
