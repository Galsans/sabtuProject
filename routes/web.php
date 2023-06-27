<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\CategoryController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');

Route::group(['prefix'=>'admin'], function () {
    Route::get('produk', [ProdukController::class, 'index'])->name('produk.index')->middleware('auth');
    Route::get('produks-create', [ProdukController::class, 'create'])->name('produk.create')->middleware('auth');
    Route::post('produks-store', [ProdukController::class, 'store'])->name('produk.store')->middleware('auth');
    Route::get('produks-edit/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit')->middleware('auth');
    Route::post('produks-update/{id}', [ProdukController::class, 'update'])->name('produk.update')->middleware('auth');
    Route::delete('produks-delete/{id}', [ProdukController::class, 'destroy'])->name('produk.delete')->middleware('auth');
});

// ROUTE KATEGORI
Route::group(['prefix'=>'admin'], function () {
    Route::get('kategori', [CategoryController::class, 'index'])->name('kategori.index')->middleware('auth');
    Route::get('kategori-create', [CategoryController::class, 'create'])->name('kategori.create')->middleware('auth');
    Route::post('kategori-store', [CategoryController::class, 'store'])->name('kategori.store')->middleware('auth');
    Route::get('kategori-edit/edit/{id}', [CategoryController::class, 'edit'])->name('kategori.edit')->middleware('auth');
    Route::post('kategori-update/{id}', [CategoryController::class, 'update'])->name('kategori.update')->middleware('auth');
    Route::delete('kategori-delete/{id}', [CategoryController::class, 'destroy'])->name('kategori.delete')->middleware('auth');
});

Route::get('cart', [ProdukController::class, 'cart'])->name('cart.index');
Route::post('cart-tambah/{id}', [ProdukController::class, 'addToCart'])->name('addToCart');
Route::patch('cart-update', [ProdukController::class, 'update'])->name('cart.update');
Route::delete('cart-remove', [ProdukController::class, 'remove'])->name('cart.remove');
