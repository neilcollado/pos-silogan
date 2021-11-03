<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Auth::routes([
    'register' => false
]);

//Admin Routes
Route::middleware('auth')->name('admin.')->group(function(){
    Route::resource('/products', ProductsController::class);
    Route::resource('/users', UserController::class)->middleware('isAdmin');
});


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
