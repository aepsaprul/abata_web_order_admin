<?php

namespace App\Http\Controllers;

use App\Models\Notif;
use Illuminate\Http\Request;

class NotifController extends Controller
{
  public function index()
  {
    $notif = Notif::whereNull('customer_id')->whereNull('status')->get();
    
    return response()->json([
      'notif' => $notif
    ]);
  }
  public function detail($id)
  {
    $notif = Notif::find($id);
    $notif->status = "read";
    $notif->save();
    
    return redirect()->route('transaksi');
  }
  public function tandai()
  {
    $notif = Notif::whereNull('customer_id')->whereNull('status')->get();
    foreach ($notif as $key => $item) {
      $notif_ = Notif::find($item->id);
      $notif_->status = "read";
      $notif_->save();
    }

    return response()->json([
      'status' => 200
    ]);
  }
}
