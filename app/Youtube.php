<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Youtube extends Model
{
    protected $table = 'youtubes';
    protected $fillable = ['title','url'];
public $timestamp = true;
}
