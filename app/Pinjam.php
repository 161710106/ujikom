<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    protected $table = 'pinjams';
    protected $fillable = ['nik_kons','nama_kons','jk_kons','alamat','no_hp','tgl_sewa','tgl_kembali','jumlah_hari','total_sewa','barangg_id'];
  

    
    public function Barangg()
    {
        return $this->belongsTo('App\Barangg','barangg_id');
    }
    public function Kembali()
    {
    	return $this->HasOne('App\Kembali','pinjam_id');
    }
    

}

