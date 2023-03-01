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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });




// php artisan route:list to list all routes

// tudo sobre promotores
Route::apiResource('promoters', App\Http\Controllers\Api\PromoterController::class);

// tudo sobre os eventos de um promotor
Route::apiResource('promoters.events', App\Http\Controllers\Api\EventController::class);

// todos os eventos de todos os promotores
Route::apiResource('events', App\Http\Controllers\Api\EventController::class)
    ->only([
        'index'
    ]);
