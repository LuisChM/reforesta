<?php

namespace App\Http\Controllers;

use App\Contador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\UpdateContadorRequest;
// use RealRashid\SweetAlert\Facades\Alert;

class ContadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contador = Contador::select('*')->get();
        return view('contadores.index', compact('contador'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contadores.create', [
            'contador' => new Contador
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateContadorRequest $request)
    {
        $contador = Contador::create($request->validated());
        return redirect()->route('contadors.index')->with('toast_success', 'Datos Creados');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contador  $contador
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id =  Crypt::decrypt($id);
        $contador = Contador::find($id);
        return view('contadores.edit', compact('contador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contador  $contador
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContadorRequest $request, Contador $contador)
    {
        $contador->update($request->validated());
        return redirect()->route('contadors.index')->with('toast_success', 'Datos Actualizados');
    }
}
