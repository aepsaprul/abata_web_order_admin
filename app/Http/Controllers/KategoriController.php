<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class KategoriController extends Controller
{
  public function index()
  {
    $kategori = Kategori::get();

    return view('kategori.index', ['kategori' => $kategori]);
  }
  public function create() 
  {
    return view('kategori.create');
  }
  public function store(Request $request)
  {
    $kategori = new Kategori;
    $kategori->nama = $request->nama;

    if($request->hasFile('gambar')) {
      $file = $request->file('gambar');
      $extension = $file->getClientOriginalExtension();
      $filename = time() . "." . $extension;
      $file->move('img_kategori/', $filename);
      $kategori->gambar = $filename;
    }

    $kategori->save();

    return redirect()->route('kategori');
  }
  public function edit($id)
  {
    $kategori = Kategori::find($id);

    return view('kategori.edit', ['kategori' => $kategori]);
  }
  public function update(Request $request, $id)
  {
    $kategori = Kategori::find($id);
    $kategori->nama = $request->nama;

    if($request->hasFile('gambar')) {
      if (file_exists("img_kategori/" . $kategori->gambar)) {
        File::delete("img_kategori/" . $kategori->gambar);
      }
      $file = $request->file('gambar');
      $extension = $file->getClientOriginalExtension();
      $filename = time() . "." . $extension;
      $file->move('img_kategori/', $filename);
      $kategori->gambar = $filename;
    }

    $kategori->save();

    return redirect()->route('kategori');
  }
  public function delete(Request $request)
  {
    $kategori = Kategori::find($request->id);

    if (file_exists("img_kategori/" . $kategori->gambar)) {
      File::delete("img_kategori/" . $kategori->gambar);
    }

    $kategori->delete();

    return redirect()->route('kategori');
  }
}
