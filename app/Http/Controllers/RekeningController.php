<?php

namespace App\Http\Controllers;

use App\Models\Rekening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RekeningController extends Controller
{
  public function index()
  {
    $rekening = Rekening::get();

    return view('rekening.index', ['rekening' => $rekening]);
  }
  public function create()
  {
    return view('rekening.create');
  }
  public function store(Request $request)
  {
    $rekening = new Rekening;
    $rekening->nama = $request->nama;
    $rekening->nomor = $request->nomor;
    $rekening->atas_nama = $request->atas_nama;
    $rekening->grup = $request->grup;

    if($request->hasFile('gambar')) {
      $file = $request->file('gambar');
      $extension = $file->getClientOriginalExtension();
      $filename = time() . "." . $extension;
      $file->move('img_rekening/', $filename);
      $rekening->gambar = $filename;
    }

    $rekening->save();

    return redirect()->route('rekening');
  }
  public function edit($id)
  {
    $rekening = Rekening::find($id);

    return view('rekening.edit', ['rekening' => $rekening]);
  }
  public function update(Request $request, $id)
  {
    $rekening = Rekening::find($id);
    $rekening->nama = $request->nama;
    $rekening->nomor = $request->nomor;
    $rekening->atas_nama = $request->atas_nama;
    $rekening->grup = $request->grup;

    if($request->hasFile('gambar')) {
      if (file_exists("img_rekening/" . $rekening->gambar)) {
        File::delete("img_rekening/" . $rekening->gambar);
      }
      $file = $request->file('gambar');
      $extension = $file->getClientOriginalExtension();
      $filename = time() . "." . $extension;
      $file->move('img_rekening/', $filename);
      $rekening->gambar = $filename;
    }

    $rekening->save();

    return redirect()->route('rekening');
  }
  public function delete(Request $request)
  {
    $rekening = Rekening::find($request->id);

    if (file_exists("img_rekening/" . $rekening->gambar)) {
      File::delete("img_rekening/" . $rekening->gambar);
    }

    $rekening->delete();

    return redirect()->route('rekening');
  }
}
