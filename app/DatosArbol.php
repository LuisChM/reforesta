<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatosArbol extends Model
{
    protected $fillable = ['imagen', 'nombrePopular', 'nombreCientifico', 'descripcion'];

    //query scope
    public function scopeBuscar($query, $nombrePopular, $nombreCientifico)
    {
        if ($nombrePopular || $nombreCientifico) {
            return $query->where('nombrePopular', 'LIKE', "%$nombrePopular%")
                ->orWhere('nombreCientifico', 'LIKE', "%$nombreCientifico%");
        }
    }
    public function eventos()
    {
        return $this->hasMany(Evento::class);
    }
}
