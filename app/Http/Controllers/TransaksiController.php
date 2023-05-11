<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Status;
use App\Models\Transaksi;
use App\Models\TransaksiStatus;
use App\Models\KonfirmasiBayar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
  public function index()
  {
    $transaksi = Transaksi::with('dataStatus')->orderBy('id', 'desc')->get();

    return view('transaksi.index', ['transaksi' => $transaksi]);
  }
  public function show($id)
  {
    $transaksi = Transaksi::with([
        'dataCustomer',
        'dataStatus',
        'dataTransaksiStatus.dataStatus',
        'dataRekening',
        'dataProvinsi',
        'dataKabupaten',
        'dataKecamatan',
        'dataKeranjang',
        'dataKeranjang.produk',
        'dataKeranjang.dataKeranjangTemplate',
        'dataKeranjang.dataKeranjangTemplate.dataTemplate',
        'dataKeranjang.dataKeranjangTemplate.dataTemplateDetail'
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
    
    $transaksi = Transaksi::with(['dataRekening'])->find($id);
    $konfirmasi = KonfirmasiBayar::where('transaksi_id', $id)->first();

    return response()->json([
      'status' => $status,
      'transaksi' => $transaksi,
      'konfirmasi' => $konfirmasi
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
    $transaksi = Transaksi::find($request->id);

    $transaksi_status = TransaksiStatus::where('transaksi_id', $transaksi->id);
    if ($transaksi_status) {
      $transaksi_status->delete();
    }

    $transaksi->delete();

    return redirect()->route('transaksi');
  }
}
