<?php

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

  // produk
  Route::get('produk', [ProdukController::class, 'index'])->name('produk');

  // slide
  Route::get('slide', [SlideController::class, 'index'])->name('slide');
});
