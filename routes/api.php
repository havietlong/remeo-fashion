<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;

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

Route::group(['middleware' => ['web']], function () {
    // SHOPPING CART
    Route::get('/cart', [CartController::class, 'index']);
    Route::prefix('/cart')->group(function () {
        Route::post('/add', [CartController::class, 'store']);
        Route::put('/update/{id}', [CartController::class, 'update']);
        Route::delete('/delete/{id}', [CartController::class, 'destroy']); 
        Route::get('/destroy_session', [CartController::class, 'destroySession']);
    });
});

// CUSTOMERS
Route::get('/customers', [CustomerController::class, 'index']);
Route::prefix('/customers')->group(function () {
    Route::post('/register', [CustomerController::class, 'store']);
});


// PRODUCTS
Route::get('/products', [ProductController::class, 'index']);
Route::prefix('/products')->group(function () {
    Route::get('/type/{id}', [ProductController::class, 'showProdByTypes']);
    Route::get('/category/{id}', [ProductController::class, 'showProdByCats']);
  

    Route::post('/add', [ProductController::class, 'store']);
    Route::get('/details/{id}', [ProductController::class, 'show']);
    Route::put('/update/{id}', [ProductController::class, 'update']);
    Route::delete('/delete/{id}', [ProductController::class, 'destroy']);
});
