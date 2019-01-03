<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testi extends Model
{
    protected $table='testis';

    protected $fillable=['testimoni'];

    public $timestamps= true;
}
