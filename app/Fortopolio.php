<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fortopolio extends Model
{
    protected $table = 'fortopolios';
  protected $fillable = ['foto','deskripsi','kategori_id'];

  public function Kategori()
  {
      return $this->belongsTo('App\Kategori','kategori_id');
  }
}
