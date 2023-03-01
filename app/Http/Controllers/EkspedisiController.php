<?php

namespace App\Http\Controllers;

use App\Models\Ekspedisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EkspedisiController extends Controller
{
  public function index()
  {
    $ekspedisi = Ekspedisi::get();

    return view('ekspedisi.index', ['ekspedisi' => $ekspedisi]);
  }
  public function create()
  {
    return view('ekspedisi.create');
  }
  public function store(Request $request)
  {
    $ekspedisi = new Ekspedisi;
    $ekspedisi->nama = $request->nama;
    $ekspedisi->harga = $request->harga;

    if($request->hasFile('gambar')) {
      $file = $request->file('gambar');
      $extension = $file->getClientOriginalExtension();
      $filename = time() . "." . $extension;
      $file->move('img_ekspedisi/', $filename);
      $ekspedisi->gambar = $filename;
    }

    $ekspedisi->save();

    return redirect()->route('ekspedisi');
  }
  public function edit($id)
  {
    $ekspedisi = Ekspedisi::find($id);
    
    return view('ekspedisi.edit', ['ekspedisi' => $ekspedisi]);
  }
  public function update(Request $request, $id)
  {
    $ekspedisi = Ekspedisi::find($id);
    $ekspedisi->nama = $request->nama;
    $ekspedisi->harga = $request->harga;

    if($request->hasFile('gambar')) {
      if (file_exists("img_ekspedisi/" . $ekspedisi->gambar)) {
        File::delete("img_ekspedisi/" . $ekspedisi->gambar);
      }
      $file = $request->file('gambar');
      $extension = $file->getClientOriginalExtension();
      $filename = time() . "." . $extension;
      $file->move('img_ekspedisi/', $filename);
      $ekspedisi->gambar = $filename;
    }

    $ekspedisi->save();

    return redirect()->route('ekspedisi');
  }
  public function delete(Request $request)
  {
    $ekspedisi = Ekspedisi::find($request->id);

    if (file_exists("img_ekspedisi/" . $ekspedisi->gambar)) {
      File::delete("img_ekspedisi/" . $ekspedisi->gambar);
    }

    $ekspedisi->delete();

    return redirect()->route('ekspedisi');
  }
}
