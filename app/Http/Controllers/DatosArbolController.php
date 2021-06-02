<?php

namespace App\Http\Controllers;

use App\DatosArbol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SaveDatosArbolRequest;

class DatosArbolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosArbol = DatosArbol::orderBy('created_at', 'ASC')->paginate();
        return view('datosArboles.index', compact('datosArbol'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('datosArboles.create', [
            'datosArbol' => new DatosArbol
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveDatosArbolRequest $request)
    {
        DatosArbol::create($request->validated());
        return redirect()->route('datosArbols.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DatosArbol  $datosArbol
     * @return \Illuminate\Http\Response
     */
    public function show(DatosArbol $datosArbol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DatosArbol  $datosArbol
     * @return \Illuminate\Http\Response
     */
    public function edit(DatosArbol $datosArbol)
    {
        return view('datosArboles.edit', [
            'datosArbol' => $datosArbol
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DatosArbol  $datosArbol
     * @return \Illuminate\Http\Response
     */
    // public function update(SaveDatosArbolRequest $request, DatosArbol $datosArbol)
    // {
    //     $datosArbol->update($request->validated());
    //     return redirect()->route('datosArbols.index');
    // }


    public function update(SaveDatosArbolRequest $request, $id)
    {
        $dato = $request->validated();

        if ($request->hasFile('imagen')) {
            $datoArbol = DatosArbol::findOrFail($id);
            Storage::delete('public/' . $datoArbol->imagen);
            $dato['imagen'] = $request->file('imagen')->store('uploads', 'public');
        }
        DatosArbol::where('id', '=', $id)->update($dato);

        $datoArbol = DatosArbol::findOrFail($id);

        return redirect()->route('datosArbols.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DatosArbol  $datosArbol
     * @return \Illuminate\Http\Response
     */
    public function destroy(DatosArbol $datosArbol)
    {
        //
    }
}
