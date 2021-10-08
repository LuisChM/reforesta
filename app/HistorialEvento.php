<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistorialEvento extends Model
{
    //query scope
    public function scopeBuscar($query, $tema)
    {
        if ($tema) {
            return $query->where('tema', 'LIKE', "%$tema%");
        }
    }
}
