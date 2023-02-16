<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
  use HasFactory;

  public function detail() {
    return $this->hasMany(TemplateDetail::class, 'template_id', 'id');
  }
}
