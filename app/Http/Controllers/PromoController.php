<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use App\Models\Kategori;
use App\Models\PromoProduk;
use Illuminate\Http\Request;

class PromoController extends Controller
{
  public function index()
  {
    $promo = Promo::get();

    return view('promo.index', ['promo' => $promo]);
  }
  public function showProduk($id)
  {
    $promo_produk = PromoProduk::with([
        'dataPromo',
        'dataProduk'
      ])
      ->where('promo_id', $id)
      ->get();
    $kategori = Kategori::get();

    return response()->json([
      'promo_produk' => $promo_produk,
      'kategori' => $kategori
    ]);
  }
  public function create()
  {
    $kategori = Kategori::with('dataProduk')->get();

    return view('promo.create', ['kategori' => $kategori]);
  }
  public function store(Request $request)
  {
    $produk = $request->produk;

    $promo = new Promo;
    $promo->nama = $request->nama;
    $promo->diskon = $request->diskon;
    $promo->satuan = $request->satuan;
    $promo->awal = $request->awal;
    $promo->akhir = $request->akhir;
    $promo->aktif = "y";
    $promo->save();

    if ($produk) {
      foreach ($produk as $key => $item) {
        $promo_produk = new PromoProduk;
        $promo_produk->promo_id = $promo->id;
        $promo_produk->produk_id = $item;
        $promo_produk->save();
      }
    }

    return redirect()->route('promo');
  }
  public function edit($id)
  {
    $promo = Promo::with('dataPromoProduk')->find($id);
    $kategori = Kategori::get();
    
    return view('promo.edit', [
      'promo' => $promo,
      'kategori' => $kategori
    ]);
  }
  public function update(Request $request, $id)
  {
    $produk = $request->produk;

    $promo = Promo::find($id);
    $promo->nama = $request->nama;
    $promo->diskon = $request->diskon;
    $promo->satuan = $request->satuan;
    $promo->awal = $request->awal;
    $promo->akhir = $request->akhir;
    $promo->save();

    if ($produk) {

      $promo_produk = PromoProduk::where('promo_id', $promo->id);
      $promo_produk->delete();

      foreach ($produk as $key => $item) {
        $promo_produk_update = new PromoProduk;
        $promo_produk_update->promo_id = $promo->id;
        $promo_produk_update->produk_id = $item;
        $promo_produk_update->save();
      }
    }

    return redirect()->route('promo');
  }
  public function delete(Request $request)
  {
    $promo = Promo::find($request->id);

    $promo_produk = PromoProduk::where('promo_id', $promo->id);
    $promo_produk->delete();

    $promo->delete();

    return redirect()->route('promo');
  }
  public function ubahStatus(Request $request)
  {
    $promo = Promo::find($request->id);
    $promo->aktif = $request->status;
    $promo->save();

    return response()->json([
      'status' => 200
    ]);
  }
}
