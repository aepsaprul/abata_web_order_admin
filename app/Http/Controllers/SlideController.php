<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SlideController extends Controller
{
  public function index()
  {
    return view('slide.index');
  }
}
