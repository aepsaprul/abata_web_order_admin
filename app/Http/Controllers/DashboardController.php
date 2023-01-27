<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function index()
  {
    $transaksi = Transaksi::get();

    return view('dashboard.index', ['transaksi' => $transaksi]);
  }
}
