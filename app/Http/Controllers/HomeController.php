<?php

namespace App\Http\Controllers;

use App\Evento;
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
        $evento = Evento::orderBy('created_at', 'ASC')->where('estado','activo')->orWhere('estado','borrador')->paginate();
        return view('home',  compact('evento'));
    }

    public function show(Evento $evento, $id)
    {
        // return view('evento',[
        //     'evento'=>$evento,
        // ]);   
        $id =  Crypt::decrypt($id);
        $evento = Evento::find($id);
        return view('evento', compact('evento'));
 
    }
}
