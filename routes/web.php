<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/shop_details',[HomeController::class,'shop_details'])->name('shop_details');
Route::get('/cart',[HomeController::class,'cart'])->name('cart');

Route::group(['prefix' => 'admin'], function(){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
});

Route::group(['account'],function(){
    Route::get('/register',[AccountController::class,'register'])->name('account.register');
    Route::get('/login',[AccountController::class,'login'])->name('account.login');
    Route::post('/processregister',[AccountController::class,'processreg'])->name('account.processregister');
});