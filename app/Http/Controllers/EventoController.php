<?php

namespace App\Http\Controllers;

use App\DatosArbol;
use App\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\SaveEventoRequest;

class EventoController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tema  = $request->get('buscarpor');

        $evento = Evento::orderBy('created_at', 'ASC')->buscar($tema)->where('estado', 'activo')->orWhere('estado', 'borrador')->paginate();
        return view('eventos.index', compact('evento'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arboles = DatosArbol::all();

        return view('eventos.create', [
            'evento' => new Evento,
            'arboles' => $arboles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveEventoRequest $request)
    {
        $evento = Evento::create($request->validated());
        $evento->arboles()->attach($request->arboles);
        $evento->save();

        return redirect()->route('eventos.index')->with('toast_success', 'Datos Creados');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id =  Crypt::decrypt($id);
        $evento = Evento::find($id);

        $arboles = DatosArbol::all();

        return view('eventos.edit', compact('evento', 'arboles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(SaveEventoRequest $request, Evento $evento)
    {
        // return $request->all();
        $evento->update($request->validated());
        $evento->arboles()->sync($request->arboles);
        return redirect()->route('eventos.index')->with('toast_success', 'Datos Actualizados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evento $evento)
    {
        $evento->delete();

        return redirect()->route('eventos.index');
    }
}
