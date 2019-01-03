<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategoris';
  protected $fillable = ['kategori'];

  public function Fortopolio()
  {
      return $this->hasMany('App\Fortopolio','kategori_id');
  }
   public function Galeri()
  {
      return $this->hasMany('App\Galeri','kategori_id');
  }
  public function booking()
  {
      return $this->hasMany('App\Booking','kategori_id');
  }
  public function hargabooking()
  {
      return $this->hasMany('App\HargaBooking','kategori_id');
  }
}