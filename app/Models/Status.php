<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
  use HasFactory;

  public function dataTransaksiStatus() {
    return $this->hasMany(TransaksiStatus::class, 'status_id', 'id');
  }
}
