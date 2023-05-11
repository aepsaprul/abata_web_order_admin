<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\ProdukTemplate;
use App\Models\ProdukTemplateDetail;
use App\Models\Template;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProdukController extends Controller
{
  public function index()
  {
    $produk = Produk::orderBy('id', 'desc')->get();

    return view('produk.index', ['produk' => $produk]);
  }
  public function create()
  {
    $kategori = Kategori::get();
    $template = Template::with('detail')->get();

    return view('produk.create', [
      'kategori' => $kategori,
      'template' => $template
    ]);
  }
  public function store(Request $request)
  {
    $produk = new Produk;
    $produk->nama = $request->nama;
    $produk->harga = $request->harga;
    $produk->kategori_id = $request->kategori_id;
    $produk->berat = $request->berat;
    $produk->min_beli = $request->min_beli;
    $produk->satuan = $request->satuan;
    $produk->deskripsi_singkat = $request->deskripsi_singkat;
    $produk->deskripsi = $request->deskripsi;
    
    if($request->hasFile('gambar')) {
      $file = $request->file('gambar');
      $extension = $file->getClientOriginalExtension();
      $filename = time() . "." . $extension;
      $file->move('img_produk/', $filename);
      $produk->gambar = $filename;
    }

    $produk->save();

    $template_head = $request->template_head;
    if ($template_head) {
      foreach ($template_head as $key => $item) {
        $produk_template = new ProdukTemplate;
        $produk_template->template_id = $item;
        $produk_template->produk_id = $produk->id;
        $produk_template->save();
      }
    }

    $template_detail = $request->template_detail;
    if ($template_detail) {
      foreach ($template_detail as $key => $item) {
        $produk_template_detail = new ProdukTemplateDetail;
        $produk_template_detail->template_detail_id = $item;
        $produk_template_detail->produk_id = $produk->id;
        $produk_template_detail->save();
      }
    }

    return redirect()->route('produk');
  }
  public function edit($id)
  {
    $produk = Produk::find($id);
    $produk_template = ProdukTemplate::where('produk_id', $id)->get();
    $produk_template_detail = ProdukTemplateDetail::where('produk_id', $id)->get();
    $kategori = Kategori::get();
    $template = Template::with('detail')->get();

    return view('produk.edit', [
      'produk' => $produk,
      'kategori' => $kategori,
      'template' => $template,
      'produk_template' => $produk_template,
      'produk_template_detail' => $produk_template_detail
    ]);
  }
  public function update(Request $request, $id)
  {
    $produk = Produk::find($id);
    $produk->nama = $request->nama;
    $produk->harga = $request->harga;
    $produk->kategori_id = $request->kategori_id;
    $produk->berat = $request->berat;
    $produk->min_beli = $request->min_beli;
    $produk->satuan = $request->satuan;
    $produk->deskripsi_singkat = $request->deskripsi_singkat;
    $produk->deskripsi = $request->deskripsi;

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

    $template_head = $request->template_head;
    if ($template_head) {
      $produk_template_old = ProdukTemplate::where('produk_id', $id);
      $produk_template_old->delete();

      foreach ($template_head as $key => $item) {
        $produk_template = new ProdukTemplate;
        $produk_template->template_id = $item;
        $produk_template->produk_id = $id;
        $produk_template->save();
      }
    }

    $template_detail = $request->template_detail;
    if ($template_detail) {
      $produk_template_detail_old = ProdukTemplateDetail::where('produk_id', $id);
      $produk_template_detail_old->delete();

      foreach ($template_detail as $key => $item) {
        $produk_template_detail = new ProdukTemplateDetail;
        $produk_template_detail->template_detail_id = $item;
        $produk_template_detail->produk_id = $id;
        $produk_template_detail->save();
      }
    }

    return redirect()->route('produk');
  }
  public function delete(Request $request)
  {
    $produk = Produk::find($request->id);

    if (file_exists("img_produk/" . $produk->gambar)) {
      File::delete("img_produk/" . $produk->gambar);
    }

    $produk_template = ProdukTemplate::where('produk_id', $request->id);
    if ($produk_template) {
      $produk_template->delete();
    }

    $produk_template_detail = ProdukTemplateDetail::where('produk_id', $request->id);
    if ($produk_template_detail) {
      $produk_template_detail->delete();
    }

    $produk->delete();

    return redirect()->route('produk');
  }
}
