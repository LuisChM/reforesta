<?php

namespace App\Http\Controllers;

use App\Evento;
use Illuminate\Http\Request;

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
        $evento = Evento::orderBy('created_at', 'ASC')->paginate();
        return view('home',  compact('evento'));
    }

    public function show(Evento $evento, $id)
    {
        // return view('evento',[
        //     'evento'=>$evento,
        // ]);   
        return view('evento', ['evento' => Evento::findOrFail($id)]);
 
    }
}
