<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeliController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BarangController;

Route::get('/',[IndexController::class, 'index'])->name('home');
// --------------------------------------------
Route::get('/contact',[IndexController::class, 'contact'])->name('contact');
// --------------------------------------------------
Route::get('/login',[AuthController::class,'index'])->name('login')->middleware('guest');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');
Route::post('/login',[AuthController::class,'login'])->name('auth')->middleware('guest');
Route::get('/register/seller',[AuthController::class,'create_seller'])->name('register.seller');
Route::post('/register/seller',[AuthController::class,'store_seller'])->name('register.create.seller');
Route::get('/register/user',[AuthController::class,'create_user'])->name('register.user');
Route::post('/register/user',[AuthController::class,'store_user'])->name('register.create.user');
Route::get('/profile',[AuthController::class,'profile'])->name('profile')->middleware('auth');
Route::get('/cari',[BarangController::class,'cari'])->name('cari');
// Barang route--------------------------------------------------------
Route::middleware(['auth'])->group(function () {
Route::get('/barang',[BarangController::class,'index'])->name('barang');
Route::get('/barang/{id}',[BarangController::class,'show'])->name('barang.show');
Route::delete('/barang/{id}',[BarangController::class,'destroy'])->name('barang.delete');
Route::post('/barang',[BarangController::class,'store'])->name('barang.store');
Route::put('/barang/{id}',[BarangController::class,'update'])->name('barang.update');
});
// Toko route-----------------------------------------------------------------
Route::get('/toko/{user}', [TokoController::class, 'index'])->name('toko');
// Keranjag Rute---------------------------------------------------------
Route::middleware(['auth'])->group(function () {
Route::get('/cart',[CartController::class,'index'])->name('cart');
Route::post('/cart/add',[CartController::class,'store'])->name('cart.add');
Route::patch('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/delete/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
});
// Beli-Route ------------------------------------------------------------------------------
Route::middleware(['auth'])->group(function(){
Route::get('/beli/{id}',[BeliController::class,'show'])->name('beli');
});
Route::get('/bayar', [OrderController::class, 'index'])->name('order');
Route::post('/bayar/{barangId}', [OrderController::class, 'store'])->name('bayar');
Route::delete('/terima/{id}', [OrderController::class, 'destroy'])->name('terima');