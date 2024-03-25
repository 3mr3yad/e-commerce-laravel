<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ApiProductController;
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


Route::controller(ApiProductController::class)->group(function () {
    Route::middleware('api_auth')->group(function () {
        // Read
        Route::get('products', "all");
        Route::get('products/{id}', "show");

        // Create
        Route::post('products', 'store');

        //update
        Route::put('products/{id}', 'update');

        //delete
        Route::delete('products/{id}', 'delete');
    });
});


Route::controller(ApiAuthController::class)->group(function () {
    // Resgestration
    Route::post('register', 'register');

    // login
    Route::post('login', 'login');

    // logout
    Route::post('logout', 'logout')->middleware('api_auth');
});
