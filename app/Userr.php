<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userr extends Model
{
    protected $table = 'userrs';
    protected $fillable = ['nama','alamat','nohp'];
  
    public function Pinjam_barang()
    {
        return $this->hasMany('App\Pinjambarang','userr_id');
    }
    public function pengembalin()
    {
        return $this->hasMany('App\Pengembalian','userr_id');
    }
}
