<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $table = 'forms';
    protected $fillable = ['filename','barangg_id'];
  
    public function Barangg()
    {
        return $this->belongsTo('App\Barangg','barangg_id');
    }
}
