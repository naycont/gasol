<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = "productos";

    protected $fillable = ["nombre", "clave","clave_sat","um","um_sat","descripcion"];

    public function clientes(){
        return  $this->belongsToMany('App\Cliente')->withPivot('precio')->withTimestamps();
    }

}
