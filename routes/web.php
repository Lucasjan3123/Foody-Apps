<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\CartController;

use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Auth;
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
//test123



Route::get('/', [HomeController::class,'home'] );
Auth::routes();

Route::get('/showProfile',[UserController::class,'show']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/transaksi/tampilan', [TransaksiController::class,'tampilan'] );

   

// Admin
Route::group(['middleware'=>['auth','checkRole:Admin']],function(){
    Route::get('/admin/kategori',[UserController::class,'indexAdmin'])->name('admin.dashboard');
    Route::get('/user',[UserController::class,'indexUser']);
    Route::get('/user/{id}/edit',[UserController::class,'editUser']);
    Route::put('/user/{id}',[UserController::class,'updateUserRole']);
    Route::delete('/user/{id_user}',[UserController::class,'destroy']);
    Route::resource('kategori', kategoriController::class);
});
Route::group(['middleware'=>['auth']],function(){
    Route::get('/profile/{id}/edits',[UserController::class,'editProfile'])->name('profile.edit');
    Route::put('/profile/{id}',[UserController::class,'updateUserProfile'])->name('profile.update');
    Route::post('/reviewBarang/{id}',[ReviewController::class,'createReview']);
});  
Route::resource('review', ReviewController::class);
Route::resource('Product', ProductController::class);
Route::get('/Product/filter/{kategori_id}',[FilterController::class,'show']);


Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');

Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');


