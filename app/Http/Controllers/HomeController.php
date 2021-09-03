<?php

namespace App\Http\Controllers;

use App\Contador;
use App\Evento;
use App\DatosArbol;
use App\Patrocinador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $evento = Evento::orderBy('created_at', 'ASC')->where('estado', 'activo')->paginate();
        $patrocinador = Patrocinador::orderBy('created_at', 'ASC')->get();
        $contador = Contador::all();
        return view('home',  compact('evento', 'contador', 'patrocinador'));
    }

    public function eventoActual(Evento $evento, $id)
    {
        // return view('evento',[
        //     'evento'=>$evento,
        // ]);   
        $id =  Crypt::decrypt($id);
        $evento = Evento::find($id);
        return view('evento', compact('evento'));
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

    // {{-- <div class="container ">
    //     <div class="row mt-5 align-items-center justify-content-between">
    //         <div class="col-12 col-md-6 ">
    //             <img src="img/bosque-2.jpg" alt="" width="450px" height="400px">
    //         </div>

    //         <div class="col-12 col-md-4 col-lg-6">
    //             <p class="text-justify lead">
    //                 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
    //                 industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
    //                 and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
    //                 leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
    //                 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
    //                 publishing software like Aldus PageMaker including versions of Lorem Ipsum.
    //             </p>
    //         </div>
    //     </div>

    //     <div class="row my-5 align-items-center justify-content-between">

    //         <div class="col-12 col-md-4 col-lg-6">
    //             <p class="text-justify lead">
    //                 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
    //                 industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
    //                 and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
    //                 leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
    //                 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
    //                 publishing software like Aldus PageMaker including versions of Lorem Ipsum.
    //             </p>
    //         </div>
    //         <div class="col-12 col-md-6 ">
    //             <img src="img/bosque-2.jpg" alt="" width="450px" height="400px">
    //         </div>
    //     </div>

    //     <div class="row">
    //         <div class="col-12">
    //             <div class="text-center my-4">
    //                 <h2>Árboles Plantados</h2>
    //                 <h3 class="contador">{{$contador[0]->arbolesSembrados}}</h3>
    //                 <img src="img/undraw_environment_iaus.png" alt="" width="400px" height="250px">
    //             </div>
    //         </div>
    //         <div class="col-12">
    //             <div>
    //                 <h2>Patrocinadores y Colaboradores</h2>
    //                 <div class="d-flex justify-content-center align-items-center flex-wrap">
    //                     @foreach ($patrocinador as $patrocinadores)
    //                     <a href="{{$patrocinadores->urlPatrocinio}}" target="_blank" title="Ver información"><img
    //                             src="{{Storage::url($patrocinadores->imagen)}}" alt="" class="" width="200px"
    //                             height="100px" style="margin: 10px"></a>
    //                     @endforeach
    //                 </div>
    //             </div>
    //         </div>
    //     </div>


    //     <div id="eventos" class="m-5">
    //         <h2 class="mb-5">Próximos Eventos</h2>
    //         <div class="row">
    //             <div class="col">
    //                 <div class="d-flex justify-content-around flex-wrap">
    //                     @foreach ($evento as $eventos)
    //                     <div class="card mb-3" style="width: 18rem;">
    //                         <div class="card-body">
    //                             <h5 class="card-title">{{$eventos->tema}}</h5>
    //                             <p class="card-text">Fecha: {{$eventos->fecha}}</p>
    //                             <p class="card-text">Hora: {{$eventos->hora}}</p>
    //                             <p class="card-text">Punto de encuentro: {{$eventos->direccion}}</p>
    //                             <a href="{{ url('detalleEvento/'.Crypt::encrypt($eventos->id))}}"
    //                                 class="btn btn-primary">Ver detalles</a>

    //                         </div>
    //                     </div>
    //                     @endforeach
    //                 </div>
    //             </div>
    //         </div>


    //     </div>

    // </div> --}}
}
