<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Status;
use App\Models\Transaksi;
use App\Models\TransaksiStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
  public function index()
  {
    $transaksi = Transaksi::with('dataStatus')->get();

    return view('transaksi.index', ['transaksi' => $transaksi]);
  }
  public function show($id)
  {
    $transaksi = Transaksi::with([
        'dataCustomer',
        'dataStatus',
        'dataRekening',
        'dataProvinsi',
        'dataKabupaten',
        'dataKecamatan',
        'dataKeranjang',
        'dataKeranjang.produk'
      ])
      ->find($id);

    $keranjang_total = Keranjang::select(DB::raw('SUM(total) as total_harga'))
      ->where('transaksi_id', $id)
      ->first();

    return response()->json([
      'transaksi' => $transaksi,
      'keranjang_total' => $keranjang_total
    ]);
  }
  public function edit($id)
  {
    $status = Status::whereDoesntHave('dataTransaksiStatus', function ($query) use ($id) {
        $query->where('transaksi_id', $id);
      })
      ->get();

    return response()->json([
      'status' => $status
    ]);
  }
  public function update(Request $request, $id)
  {
    $status = $request->status_id;

    $transaksi = Transaksi::find($id);
    $transaksi->status = $status;
    $transaksi->save();

    $transaksi_status = new TransaksiStatus;
    $transaksi_status->transaksi_id = $id;

    if ($status == 3) {
      $transaksi_status->status_id = $status;
      $transaksi_status->keterangan = "pesanan sedang diproses";
    } else if ($status == 4) {
      $transaksi_status->status_id = $status;
      $transaksi_status->keterangan = "pesanan sedang dikirim";
    } else if ($status == 5) {
      $transaksi_status->status_id = $status;
      $transaksi_status->keterangan = "pesanan sudah sampai";
    } else if ($status == 6) {
      $transaksi_status->status_id = $status;
      $transaksi_status->keterangan = "selesai";
    }

    $transaksi_status->save();

    return response()->json([
      'status' => 200
    ]);
  }
  public function delete(Request $request)
  {
    
  }
}
