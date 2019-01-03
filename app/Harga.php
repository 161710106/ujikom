<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Harga extends Model
{
protected $table = 'hargas';
protected $fillable = ['jenispaket','harga','kategori_id'];

public function Kategori()
{
    return $this->belongsTo('App\Kategori','kategori_id');
}
public function booking()
{
    return $this->hasMany('App\Booking','harga_id');
}
}
