<?php

namespace App\Http\Controllers;

use App\Models\Landing;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class LandingController extends Controller
{
  public function index()
  {
    $landing = Landing::get();

    return view('landing.index', ['landings' => $landing]);
  }

  public function edit($id)
  {
    $landing = Landing::find($id);

    return view('landing.edit', ['landing' => $landing]);
  }

  public function update(Request $request, $id)
  {
    $landing = Landing::find($id);
    $landing->nama = $request->nama;
    
    if($request->hasFile('img_1')) {
      if (file_exists("img_landing/" . $landing->img_1)) {
        File::delete("img_landing/" . $landing->img_1);
      }
      $file_img_1 = $request->file('img_1');
      $extension_img_1 = $file_img_1->getClientOriginalExtension();
      $filename_img_1 = "img_1" . time() . "." . $extension_img_1;
      $file_img_1->move('img_landing/', $filename_img_1);
      $landing->img_1 = $filename_img_1;
    }

    if($request->hasFile('img_2')) {
      if (file_exists("img_landing/" . $landing->img_2)) {
        File::delete("img_landing/" . $landing->img_2);
      }
      $file_img_2 = $request->file('img_2');
      $extension_img_2 = $file_img_2->getClientOriginalExtension();
      $filename_img_2 = "img_2" . time() . "." . $extension_img_2;
      $file_img_2->move('img_landing/', $filename_img_2);
      $landing->img_2 = $filename_img_2;
    }
    
    if($request->hasFile('img_3')) {
      if (file_exists("img_landing/" . $landing->img_3)) {
        File::delete("img_landing/" . $landing->img_3);
      }
      $file_img_3 = $request->file('img_3');
      $extension_img_3 = $file_img_3->getClientOriginalExtension();
      $filename_img_3 = "img_3" . time() . "." . $extension_img_3;
      $file_img_3->move('img_landing/', $filename_img_3);
      $landing->img_3 = $filename_img_3;
    }

    if($request->hasFile('img_4')) {
      if (file_exists("img_landing/" . $landing->img_4)) {
        File::delete("img_landing/" . $landing->img_4);
      }
      $file_img_4 = $request->file('img_4');
      $extension_img_4 = $file_img_4->getClientOriginalExtension();
      $filename_img_4 = "img_4" . time() . "." . $extension_img_4;
      $file_img_4->move('img_landing/', $filename_img_4);
      $landing->img_4 = $filename_img_4;
    }

    if($request->hasFile('img_5')) {
      if (file_exists("img_landing/" . $landing->img_5)) {
        File::delete("img_landing/" . $landing->img_5);
      }
      $file_img_5 = $request->file('img_5');
      $extension_img_5 = $file_img_5->getClientOriginalExtension();
      $filename_img_5 = "img_5" . time() . "." . $extension_img_5;
      $file_img_5->move('img_landing/', $filename_img_5);
      $landing->img_5 = $filename_img_5;
    }

    if($request->hasFile('img_6')) {
      if (file_exists("img_landing/" . $landing->img_6)) {
        File::delete("img_landing/" . $landing->img_6);
      }
      $file_img_6 = $request->file('img_6');
      $extension_img_6 = $file_img_6->getClientOriginalExtension();
      $filename_img_6 = "img_6" . time() . "." . $extension_img_6;
      $file_img_6->move('img_landing/', $filename_img_6);
      $landing->img_6 = $filename_img_6;
    }

    $landing->teks_1 = $request->teks_1;
    $landing->teks_2 = $request->teks_2;
    $landing->teks_3 = $request->teks_3;
    $landing->teks_4 = $request->teks_4;
    $landing->telepon = $request->telepon;
    $landing->teks_wa = $request->teks_wa;
    $landing->pixel_1 = $request->pixel_1;
    $landing->pixel_2 = $request->pixel_2;
    $landing->save();

    return redirect()->route('landing');
  }
  
  public function delete($id)
  {
    $landing = Landing::find($id);
    $landing->delete();

    return redirect()->route('landing');
  }
}
