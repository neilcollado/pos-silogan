<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\OrderHistoryController;
use App\Http\Controllers\Admin\TransactionsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Auth::routes([
    'register' => false
]);

//Admin Routes
Route::middleware('auth')->name('admin.')->group(function(){
    Route::resource('/products', ProductsController::class);
    
    //extra methods for orders
    Route::get('/orders/{id}/cancel', [OrdersController::class, 'cancel'])->name('orders.cancel');
    Route::get('/orders/{id}/complete', [OrdersController::class, 'complete'])->name('orders.complete');
    Route::get('/users/profile', [UserController::class, 'profile'])->name('users.profile');

    Route::resource('/transactions',TransactionsController::class);
    Route::resource('/orders', OrdersController::class);
    Route::resource('/orderHistory', OrderHistoryController::class);
    Route::resource('/users', UserController::class);
});


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
