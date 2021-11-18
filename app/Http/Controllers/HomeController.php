<?php

namespace App\Http\Controllers;

use App\Contador;
use App\Evento;
use App\DatosArbol;
use App\Paginaprincipal;
use App\Patrocinador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class HomeController extends Controller
{
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $evento = Evento::orderBy('created_at', 'ASC')->where('estado', 'activo')->get();
        $patrocinador = Patrocinador::orderBy('created_at', 'ASC')->get();
        $contador = Contador::first();
        $paginaPrincipal = Paginaprincipal::first();
        return view('home',  compact('evento', 'contador', 'patrocinador', 'paginaPrincipal'));
    }

    public function eventoActual(Evento $evento, $id)
    {
        $id =  Crypt::decrypt($id);
        $evento = Evento::find($id);
        return view('detalleEvento', compact('evento'));
    }

    public function eventoPasado()
    {
        $evento = Evento::orderBy('created_at', 'ASC')->where('estado', 'inactivo')->paginate();
        return view('eventoPasado',  compact('evento'));
    }

    public function nuestroArbol()
    {
        $datosArbol = DatosArbol::all();
        return view('nuestroArbol', compact('datosArbol'));
    }

}
