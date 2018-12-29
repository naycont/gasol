<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'ventas';

    protected $fillable = ["cantidad","total","fecha_venta"];


    public function cliente(){
      return $this->belongsTo('App\Cliente')->withTimestamps();
    }

    public function producto(){
      return $this->belongsTo('App\Producto')->withTimestamps();
    }
}
