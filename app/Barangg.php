<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barangg extends Model
{ protected $table = 'baranggs';
    protected $fillable = ['nama_barang','kode','jenis','stock','harga','kategoribarang_id'];
  
    public function pinjam()
    {
        return $this->hasMany('App\Pinjam','barangg_id');
    }
    public function kembali()
    {
        return $this->belongsTo('App\Kembali','barangg_id');
 
   }
   public function Kategoribarang()
  {
      return $this->belongsTo('App\Kategoribarang','kategoribarang_id');
  }

  public function barangg()
  {
      return $this->hasMany('App\Barangg','barangg_id');
  }

}