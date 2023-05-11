<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function index()
  {
    $transaksi_page = Transaksi::where('status', '!=', '6')->orderBy('id', 'desc')->get();

    $transaksi = Transaksi::get();
    $count_transaksi = count($transaksi);

    $pesanan_hari_ini = Transaksi::where('created_at', 'like', '%'.date('Y-m-d').'%')->get();
    $count_pesanan_hari_ini = count($pesanan_hari_ini);

    $belum_bayar = Transaksi::where('status', '1')->get();
    $count_belum_bayar = count($belum_bayar);

    return view('dashboard.index', [
      'transaksi_page' => $transaksi_page,
      'count_transaksi' => $count_transaksi,
      'count_pesanan_hari_ini' => $count_pesanan_hari_ini,
      'count_belum_bayar' => $count_belum_bayar
    ]);
  }
}
