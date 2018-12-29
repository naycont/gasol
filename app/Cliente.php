<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = "clientes";

    protected $fillable = ['nombre','rfc','direccion','telefono','email','factura','nota'];

    public function productos(){
      return  $this->belongsToMany('App\Producto')->withPivot('precio')->withTimestamps();
    }

  
}
