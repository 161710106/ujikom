<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kembali extends Model
{
    protected $table = 'kembalis';
    protected $fillable = ['tgl_kembali_akhir','jumlah_hari','telat','denda','total_harga','pinjam_id'];
  
    public function Pinjam()
    {
    	return $this->belongsTo('App\Pinjam','pinjam_id');
    }
}