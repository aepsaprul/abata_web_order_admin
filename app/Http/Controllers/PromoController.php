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
    $promo->save();

    foreach ($produk as $key => $item) {
      $promo_produk = new PromoProduk;
      $promo_produk->promo_id = $promo->id;
      $promo_produk->produk_id = $item;
      $promo_produk->save();
    }

    return redirect()->route('promo');
  }
  public function edit($id)
  {
    $promo = Promo::find($id);
    
    return view('promo.edit', ['promo' => $promo]);
  }
  public function update(Request $request, $id)
  {
    $promo = Promo::find($id);
    $promo->nama = $request->nama;
    $promo->diskon = $request->diskon;
    $promo->satuan = $request->satuan;
    $promo->produk_id = $request->produk_id;
    $promo->awal = $request->awal;
    $promo->akhir = $request->akhir;
    $promo->save();

    return redirect()->route('promo');
  }
  public function delete(Request $request)
  {
    $promo = Promo::find($request->id);
    $promo->delete();

    return redirect()->route('promo');
  }
}
