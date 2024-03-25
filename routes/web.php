<?php

use App\Http\Controllers\HomeContoller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('redirect', [HomeContoller::class, 'redirect'])->name('redirect')->middleware('auth');

Route::controller(ProductController::class)->group(function () {
    Route::middleware('is_admin', 'auth')->group(function () {
        Route::prefix('admin')->group(function () {


            Route::get("products", "all")->name('products');
            Route::get("products/show/{id}", "show")->name('prdocutId');

            Route::get("products/create", "create")->name('productCreate');
            Route::post("products", "store")->name('productStore');

            Route::get("products/edit/{id}", "edit")->name('productCreate');
            Route::post("products/update/{id}", "update")->name('productUpdate');

            Route::post("products/delete/{id}", "delete")->name('productDelete');
        });
    });
});

Route::get('change/{lang}', function ($lang) {
    //ar
    if ($lang == "ar") {
        session()->put("lang", "ar");
    } else {
        session()->put("lang", "en");
    }
    return redirect()->back();
});

// Users Route
Route::controller(UserController::class)->group(function () {
    Route::get('', 'all');
});
