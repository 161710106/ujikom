<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galerry extends Model
{
    protected $table = 'galerries';
   protected $fillable = ['foto','kategori_id'];

   public function Kategori()
   {
       return $this->belongsTo('App\Kategori','kategori_id');
   }
}
