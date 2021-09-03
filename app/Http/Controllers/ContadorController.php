<?php

namespace App\Http\Controllers;

use App\Contador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\UpdateContadorRequest;

class ContadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contador = Contador::all();
        return view('contadores.index', compact('contador'));  
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
        return redirect()->route('contadors.index');
    }

}
