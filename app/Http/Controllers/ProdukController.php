<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProdukController extends Controller
{
  public function index()
  {
    $produk = Produk::get();

    return view('produk.index', ['produk' => $produk]);
  }
  public function create()
  {
    $kategori = Kategori::get();

    return view('produk.create', ['kategori' => $kategori]);
  }
  public function store(Request $request)
  {
    $produk = new Produk;
    $produk->nama = $request->nama;
    $produk->harga = $request->harga;
    $produk->kategori_id = $request->kategori_id;
    
    if($request->hasFile('gambar')) {
      $file = $request->file('gambar');
      $extension = $file->getClientOriginalExtension();
      $filename = time() . "." . $extension;
      $file->move('img_produk/', $filename);
      $produk->gambar = $filename;
    }

    $produk->save();

    return redirect()->route('produk');
  }
  public function edit($id)
  {
    $produk = Produk::find($id);
    $kategori = Kategori::get();

    return view('produk.edit', [
      'produk' => $produk,
      'kategori' => $kategori
    ]);
  }
  public function update(Request $request, $id)
  {
    $produk = Produk::find($id);
    $produk->nama = $request->nama;
    $produk->harga = $request->harga;
    $produk->kategori_id = $request->kategori_id;

    if($request->hasFile('gambar')) {
      if (file_exists("img_produk/" . $produk->gambar)) {
        File::delete("img_produk/" . $produk->gambar);
      }
      $file = $request->file('gambar');
      $extension = $file->getClientOriginalExtension();
      $filename = time() . "." . $extension;
      $file->move('img_produk/', $filename);
      $produk->gambar = $filename;
    }

    $produk->save();

    return redirect()->route('produk');
  }
  public function delete(Request $request)
  {
    $produk = Produk::find($request->id);

    if (file_exists("img_produk/" . $produk->gambar)) {
      File::delete("img_produk/" . $produk->gambar);
    }

    $produk->delete();

    return redirect()->route('produk');
  }
}
