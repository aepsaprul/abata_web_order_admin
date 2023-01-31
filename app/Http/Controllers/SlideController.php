<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SlideController extends Controller
{
  public function index()
  {
    $slide = Slide::get();

    return view('slide.index', ['slide' => $slide]);
  }
  public function create()
  {
    return view('slide.create');
  }
  public function store(Request $request)
  {
    $slide = new Slide;
    $file = $request->file('gambar');
    $extension = $file->getClientOriginalExtension();
    $filename = time() . "." . $extension;
    $file->move('img_slide/', $filename);
    $slide->gambar = $filename;
    $slide->save();

    return redirect()->route('slide');
  }
  public function edit($id)
  {
    $slide = Slide::find($id);

    return view('slide.edit', ['slide' => $slide]);
  }
  public function update(Request $request, $id)
  {
    $slide = Slide::find($id);
    if (file_exists("img_slide/" . $slide->gambar)) {
      File::delete("img_slide/" . $slide->gambar);
    }
    $file = $request->file('gambar');
    $extension = $file->getClientOriginalExtension();
    $filename = time() . "." . $extension;
    $file->move('img_slide/', $filename);
    $slide->gambar = $filename;
    $slide->save();

    return redirect()->route('slide');
  }
  public function delete(Request $request)
  {
    $slide = Slide::find($request->id);
    if (file_exists("img_slide/" . $slide->gambar)) {
      File::delete("img_slide/" . $slide->gambar);
    }
    $slide->delete();

    return redirect()->route('slide');
  }
}
