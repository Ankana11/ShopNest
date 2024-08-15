<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\InventryController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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

Route::group(['prefix' => 'admin'], function() {
    Route::group(['middleware' => 'admin.guest'], function() {
        Route::get('/login', [DashboardController::class, 'login'])->name('admin.login');
        Route::post('/authenticate', [DashboardController::class, 'authenticate'])->name('admin.authenticate');
    });
    Route::group(['middleware' => 'admin.auth'], function() {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/logout', [DashboardController::class, 'logout'])->name('admin.logout');
        Route::get('/category/create', [CategoryController::class, 'create'])->name('admin.create-category');
        Route::post('/store', [CategoryController::class, 'store'])->name('admin.store');
        Route::get('/list', [CategoryController::class, 'index'])->name('admin.list');
        Route::get('/create-inventry', [InventryController::class, 'create'])->name('admin.create-inventry');

        Route::get('/getSlug',function(Request $request){
        $slug = '';
        if(!empty($request->title)){
            $slug = Str::slug($request->title);
        }
        return response()->json([
            'status' => true,
            'slug' => $slug  
        ]);

        })->name('getSlug');


    });
});
Route::get('/register', [AccountController::class, 'register'])->name('account.register');
Route::get('/login', [AccountController::class, 'login'])->name('account.login');
Route::post('/processregister', [AccountController::class, 'processreg'])->name('account.processregister');
