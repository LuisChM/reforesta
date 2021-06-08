<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = ['tema','descripcion','direccion','distrito','lat','lng','fecha','hora'];
}
