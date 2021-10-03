<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\UserController;
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

Auth::routes();

//Admin Routes
Route::prefix('admin')->middleware('auth')->name('admin.')->group(function(){
    Route::resource('/products', ProductsController::class);
    Route::resource('/users', UserController::class)->middleware('isAdmin');
});


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
