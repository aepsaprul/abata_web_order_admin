<?php

namespace App\Http\Controllers;

use App\Models\CaraPesan;
use App\Models\CaraPesanGambar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CaraPesanController extends Controller
{
  public function index()
  {
    $cara_pesan = CaraPesan::get();
    $cara_pesan_gambar = CaraPesanGambar::get();

    return view('cara_pesan.index', [
      'cara_pesan' => $cara_pesan,
      'cara_pesan_gambar' => $cara_pesan_gambar
    ]);
  }
  public function create()
  {
    return view('cara_pesan.create');
  }
  public function store(Request $request)
  {
    $cara_pesan = new CaraPesan;
    $cara_pesan->nama = $request->nama;
    $cara_pesan->save();

    return redirect()->route('cara_pesan');
  }
  public function edit($id)
  {
    $cara_pesan = CaraPesan::find($id);

    return view('cara_pesan.edit', ['cara_pesan' => $cara_pesan]);
  }
  public function update(Request $request, $id)
  {
    $cara_pesan = CaraPesan::find($id);
    $cara_pesan->nama = $request->nama;
    $cara_pesan->save();

    return redirect()->route('cara_pesan');
  }
  public function delete(Request $request)
  {
    $cara_pesan = CaraPesan::find($request->cara_pesan_id);
    $cara_pesan->delete();

    return redirect()->route('cara_pesan');
  }

  // gambar
  public function createGambar()
  {
    return view('cara_pesan.gambarCreate');
  }
  public function storeGambar(Request $request)
  {
    $cara_pesan_gambar = new CaraPesanGambar;
    $file = $request->file('gambar');
    $extension = $file->getClientOriginalExtension();
    $filename = time() . "." . $extension;
    $file->move('img_cara_pesan_gambar/', $filename);
    $cara_pesan_gambar->gambar = $filename;
    $cara_pesan_gambar->save();

    return redirect()->route('cara_pesan');
  }
  public function editGambar($id)
  {
    $cara_pesan_gambar = CaraPesanGambar::find($id);

    return view('cara_pesan.gambarEdit', ['cara_pesan_gambar' => $cara_pesan_gambar]);
  }
  public function updateGambar(Request $request, $id)
  {
    $cara_pesan_gambar = CaraPesanGambar::find($id);
    if (file_exists("img_cara_pesan_gambar/" . $cara_pesan_gambar->gambar)) {
      File::delete("img_cara_pesan_gambar/" . $cara_pesan_gambar->gambar);
    }
    $file = $request->file('gambar');
    $extension = $file->getClientOriginalExtension();
    $filename = time() . "." . $extension;
    $file->move('img_cara_pesan_gambar/', $filename);
    $cara_pesan_gambar->gambar = $filename;
    $cara_pesan_gambar->save();

    return redirect()->route('cara_pesan');
  }
  public function deleteGambar(Request $request)
  {
    $cara_pesan_gambar = CaraPesanGambar::find($request->gambar_id);
    if (file_exists("img_cara_pesan_gambar/" . $cara_pesan_gambar->gambar)) {
      File::delete("img_cara_pesan_gambar/" . $cara_pesan_gambar->gambar);
    }
    $cara_pesan_gambar->delete();

    return redirect()->route('cara_pesan');
  }
}
