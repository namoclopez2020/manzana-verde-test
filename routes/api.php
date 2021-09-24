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

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login',  [App\Http\Controllers\AuthController::class, 'login']);
    Route::post('register', [App\Http\Controllers\AuthController::class, 'register']);
    Route::get('logout', [App\Http\Controllers\AuthController::class, 'logout']);
    Route::get('food/list',  [App\Http\Controllers\FoodController::class, 'list']);
    Route::get('food/list_of_user',  [App\Http\Controllers\FoodController::class, 'listOfUser']);
    Route::post('food/assign',  [App\Http\Controllers\FoodController::class, 'assign']);
    Route::post('food/delete',  [App\Http\Controllers\FoodController::class, 'delete']);
});

