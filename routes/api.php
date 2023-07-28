<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\usersController;
use App\Http\Controllers\order_itemsController;
use App\Http\Controllers\ordersController;
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
        Route::get('/quantity', [CartController::class, 'indexQuantity']);
        Route::put('/update/{id}', [CartController::class, 'update']);
        Route::delete('/delete/{id}', [CartController::class, 'destroy']);
        Route::get('/destroy_session', [CartController::class, 'destroySessionCart']);
    });

    // CUSTOMERS
    Route::get('/user', [usersController::class, 'index']);
    Route::prefix('/user')->group(function () {
        Route::post('/register', [usersController::class, 'store']);
        Route::post('/login', [usersController::class, 'validateLogin']);
        Route::get('/destroy_session', [usersController::class, 'destroySessionUser']);
    });

    
    

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

// FILTER TAB(PRODUCT_CATEGORIES)

Route::prefix('/categories')->group(function () {
    Route::get('/{id}', [CategoriesController::class, 'showCatByTypes']);
    Route::post('/add', [ProductController::class, 'store']);
    Route::get('/details/{id}', [ProductController::class, 'show']);
    Route::put('/update/{id}', [ProductController::class, 'update']);
    Route::delete('/delete/{id}', [ProductController::class, 'destroy']);
});

//INVOICE 
Route::prefix('/inVoice')->group(function () {
    Route::post('/addOrder_items', [order_itemsController::class, 'store']);
    Route::post('/addOrders', [ordersController::class, 'store']);
    Route::get('/Orders', [ordersController::class, 'latestIndex']);
    Route::get('/Order', [ordersController::class, 'index']);
    Route::get('/Order_items', [order_itemsController::class, 'index']);
});

//STAFF
Route::get('/staff', [usersController::class, 'staffIndex']);
Route::prefix('/staff')->group(function () {
    Route::put('/verify/{id}', [ordersController::class, 'verifyOrder']);
    Route::put('/modify/{id}', [ProductController::class, 'modifyProduct']);
    Route::delete('/delete/{id}', [ProductController::class, 'destroy']);
});

Route::get('/admin', [usersController::class, 'index']);
Route::prefix('/admin')->group(function () {
    Route::put('/modify/{id}', [usersController::class, 'modifyStaff']);
    Route::delete('/delete/{id}', [usersController::class, 'destroy']);
    Route::post('/add', [usersController::class, 'addNewEmployee']);
});

