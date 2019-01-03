<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';
    protected $fillable = ['nama','waktu','date','tempat','kategori_id','harga_id'];
  
    public function Kategori()
    {
        return $this->belongsTo('App\Kategori','kategori_id');
    }
    public function harga()
    {
        return $this->belongsTo('App\Harga','harga_id');
    }
}