<?php

use App\Http\Controllers\CaraPesanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EkspedisiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\TemplateController;
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

  // template
  Route::get('template', [TemplateController::class, 'index'])->name('template');
  Route::get('template/create', [TemplateController::class, 'create'])->name('template.create');
  Route::post('template/store', [TemplateController::class, 'store'])->name('template.store');
  Route::get('template/{id}/edit', [TemplateController::class, 'edit'])->name('template.edit');
  Route::put('template/{id}/update', [TemplateController::class, 'update'])->name('template.update');
  Route::post('template/delete', [TemplateController::class, 'delete'])->name('template.delete');

  // template detail
  Route::get('template_detail', [TemplateController::class, 'indexDetail'])->name('template_detail');
  Route::get('template_detail/create', [TemplateController::class, 'createDetail'])->name('template_detail.create');
  Route::post('template_detail/store', [TemplateController::class, 'storeDetail'])->name('template_detail.store');
  Route::get('template_detail/{id}/edit', [TemplateController::class, 'editDetail'])->name('template_detail.edit');
  Route::put('template_detail/{id}/update', [TemplateController::class, 'updateDetail'])->name('template_detail.update');
  Route::post('template_detail/delete', [TemplateController::class, 'deleteDetail'])->name('template_detail.delete');

  // ekspedisi
  Route::get('ekspedisi', [EkspedisiController::class, 'index'])->name('ekspedisi');
  Route::get('ekspedisi/create', [EkspedisiController::class, 'create'])->name('ekspedisi.create');
  Route::post('ekspedisi/store', [EkspedisiController::class, 'store'])->name('ekspedisi.store');
  Route::get('ekspedisi/{id}/edit', [EkspedisiController::class, 'edit'])->name('ekspedisi.edit');
  Route::put('ekspedisi/{id}/update', [EkspedisiController::class, 'update'])->name('ekspedisi.update');
  Route::post('ekspedisi/delete', [EkspedisiController::class, 'delete'])->name('ekspedisi.delete');
});
