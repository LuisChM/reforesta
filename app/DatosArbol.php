<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatosArbol extends Model
{
    protected $fillable = ['imagen', 'nombrePopular', 'nombreCientifico', 'descripcion'];
}
