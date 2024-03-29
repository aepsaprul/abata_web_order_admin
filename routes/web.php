<?php

use App\Http\Controllers\CaraPesanController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EkspedisiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NotifController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\RekeningController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\TransaksiController;
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
  Route::get('produk/template', [ProdukController::class, 'template'])->name('produk.template');
  Route::post('produk/tampil', [ProdukController::class, 'tampil'])->name('produk.tampil');

  // customer
  Route::get('customer', [CustomerController::class, 'index'])->name('customer');
  Route::get('customer/{id}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
  Route::put('customer/{id}/update', [CustomerController::class, 'update'])->name('customer.update');
  Route::post('customer/delete', [CustomerController::class, 'delete'])->name('customer.delete');

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

  // rekening
  Route::get('rekening', [RekeningController::class, 'index'])->name('rekening');
  Route::get('rekening/create', [RekeningController::class, 'create'])->name('rekening.create');
  Route::post('rekening/store', [RekeningController::class, 'store'])->name('rekening.store');
  Route::get('rekening/{id}/edit', [RekeningController::class, 'edit'])->name('rekening.edit');
  Route::put('rekening/{id}/update', [RekeningController::class, 'update'])->name('rekening.update');
  Route::post('rekening/delete', [RekeningController::class, 'delete'])->name('rekening.delete');

  // transaksi
  Route::get('transaksi', [TransaksiController::class, 'index'])->name('transaksi');
  Route::get('transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
  Route::get('transaksi/{id}/show', [TransaksiController::class, 'show'])->name('transaksi.show');
  Route::get('transaksi/{id}/edit', [TransaksiController::class, 'edit'])->name('transaksi.edit');
  Route::post('transaksi/update', [TransaksiController::class, 'update'])->name('transaksi.update');
  Route::post('transaksi/delete', [TransaksiController::class, 'delete'])->name('transaksi.delete');

  // promo
  Route::get('promo', [PromoController::class, 'index'])->name('promo');
  Route::get('promo/{id}/showProduk', [PromoController::class, 'showProduk'])->name('promo.showProduk');
  Route::get('promo/create', [PromoController::class, 'create'])->name('promo.create');
  Route::post('promo/store', [PromoController::class, 'store'])->name('promo.store');
  Route::get('promo/{id}/edit', [PromoController::class, 'edit'])->name('promo.edit');
  Route::put('promo/{id}/update', [PromoController::class, 'update'])->name('promo.update');
  Route::post('promo/delete', [PromoController::class, 'delete'])->name('promo.delete');
  Route::post('promo/ubah_status', [PromoController::class, 'ubahStatus'])->name('promo.ubah_status');

  // notif
  Route::get('notif', [NotifController::class, 'index'])->name('notif');
  Route::get('notif/{id}/detail', [NotifController::class, 'detail'])->name('notif.detail');
  Route::get('notif/tandai', [NotifController::class, 'tandai'])->name('notif.tandai');

  // landing
  Route::get('landing', [LandingController::class, 'index'])->name('landing');
  Route::get('landing/{id}/edit', [LandingController::class, 'edit'])->name('landing.edit');
  Route::put('landing/{id}/update', [LandingController::class, 'update'])->name('landing.update');
  Route::get('landing/{id}/delete', [LandingController::class, 'delete'])->name('landing.delete');
});
