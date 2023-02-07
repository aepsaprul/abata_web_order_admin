<?php

use App\Http\Controllers\CaraPesanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SlideController;
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

Route::get('/', function () {
  return redirect()->route('login');
});
Route::get('login', [LoginController::class, 'form'])->name('login');
Route::post('login/auth', [LoginController::class, 'authenticate'])->name('login.auth');

Route::middleware(['auth', 'prevent-back-history'])->group(function () {
  Route::post('logout', [LoginController::class, 'logout'])->name('logout');
  Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

  // kategori
  Route::get('kategori', [KategoriController::class, 'index'])->name('kategori');
  Route::get('kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
  Route::post('kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
  Route::get('kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
  Route::put('kategori/{id}/update', [KategoriController::class, 'update'])->name('kategori.update');
  Route::post('kategori/delete', [KategoriController::class, 'delete'])->name('kategori.delete');

  // produk
  Route::get('produk', [ProdukController::class, 'index'])->name('produk');
  Route::get('produk/create', [ProdukController::class, 'create'])->name('produk.create');
  Route::post('produk/store', [ProdukController::class, 'store'])->name('produk.store');
  Route::get('produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
  Route::put('produk/{id}/update', [ProdukController::class, 'update'])->name('produk.update');
  Route::post('produk/delete', [ProdukController::class, 'delete'])->name('produk.delete');

  // slide
  Route::get('slide', [SlideController::class, 'index'])->name('slide');
  Route::get('slide/create', [SlideController::class, 'create'])->name('slide.create');
  Route::post('slide/store', [SlideController::class, 'store'])->name('slide.store');
  Route::get('slide/{id}/edit', [SlideController::class, 'edit'])->name('slide.edit');
  Route::put('slide/{id}/update', [SlideController::class, 'update'])->name('slide.update');
  Route::post('slide/delete', [SlideController::class, 'delete'])->name('slide.delete');

  // cara_pesan
  Route::get('cara_pesan', [CaraPesanController::class, 'index'])->name('cara_pesan');
  Route::get('cara_pesan/create', [CaraPesanController::class, 'create'])->name('cara_pesan.create');
  Route::post('cara_pesan/store', [CaraPesanController::class, 'store'])->name('cara_pesan.store');
  Route::get('cara_pesan/{id}/edit', [CaraPesanController::class, 'edit'])->name('cara_pesan.edit');
  Route::put('cara_pesan/{id}/update', [CaraPesanController::class, 'update'])->name('cara_pesan.update');
  Route::post('cara_pesan/delete', [CaraPesanController::class, 'delete'])->name('cara_pesan.delete');

  // cara pesan gambar
  Route::get('cara_pesan_gambar/create', [CaraPesanController::class, 'createGambar'])->name('cara_pesan_gambar.create');
  Route::post('cara_pesan_gambar/store', [CaraPesanController::class, 'storeGambar'])->name('cara_pesan_gambar.store');
  Route::get('cara_pesan_gambar/{id}/edit', [CaraPesanController::class, 'editGambar'])->name('cara_pesan_gambar.edit');
  Route::put('cara_pesan_gambar/{id}/update', [CaraPesanController::class, 'updateGambar'])->name('cara_pesan_gambar.update');
  Route::post('cara_pesan_gambar/delete', [CaraPesanController::class, 'deleteGambar'])->name('cara_pesan_gambar.delete');
});
