<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = ['tema','estado','descripcion','direccion','distrito','lat','lng','fecha','horaInicio', 'horaFinaliza'];
 //query scope
 public function scopeBuscar($query, $tema)
 {
  if($tema ){
      return $query->where('tema', 'LIKE', "%$tema%");
    }
  }

  public function arboles()
  {
      return $this->belongsToMany(DatosArbol::class, 'asignar_arboleseventos');
  }

}
