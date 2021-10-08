<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patrocinador extends Model
{
    protected $fillable = ['imagen', 'urlPatrocinio','nombrePatrocinador'];
    //query scope
    public function scopeBuscar($query, $nombrePatrocinador)
    {
        if ($nombrePatrocinador) {
            return $query->where('nombrePatrocinador', 'LIKE', "%$nombrePatrocinador%");
        }
    }
}
