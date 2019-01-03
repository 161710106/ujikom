<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategoribarang extends Model
{
    protected $table = 'kategoribarangs';
  protected $fillable = ['kategori'];
  public function Barangg()
  {
      return $this->hasMany('App\Barangg','kategoribarang_id');
  }
}
