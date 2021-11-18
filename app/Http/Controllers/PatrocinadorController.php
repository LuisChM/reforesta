<?php

namespace App\Http\Controllers;

use App\Patrocinador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SavePatrocinioRequest;
use App\Http\Requests\UpdatePatrocinioResquest;

class PatrocinadorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombrePatrocinador  = $request->get('buscarpor');
        $patrocinador = Patrocinador::orderBy('created_at', 'ASC')->buscar($nombrePatrocinador)->paginate();
        return view('patrocinadores.index', compact('patrocinador'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patrocinadores.create', [
            'patrocinador' => new Patrocinador
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SavePatrocinioRequest $request)
    {
        $patrocinador = (new Patrocinador())->fill($request->validated());
        if ($request->hasFile('imagen')) {
            $patrocinador->imagen = $request->file('imagen')->store('uploads', 'public');
        }
        $patrocinador->save();
        return redirect()->route('patrocinadors.index')->with('toast_success', 'Datos Creados');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patrocinador  $patrocinador
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id =  Crypt::decrypt($id);
        $patrocinador = Patrocinador::find($id);
        return view('patrocinadores.edit', compact('patrocinador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patrocinador  $patrocinador
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePatrocinioResquest $request, $id)
    {
        $dato = $request->validated();

        if ($request->hasFile('imagen')) {
            $patrociandor = Patrocinador::findOrFail($id);
            Storage::delete('public/' . $patrociandor->imagen);
            $dato['imagen'] = $request->file('imagen')->store('uploads', 'public');
        }
        Patrocinador::where('id', '=', $id)->update($dato);

        $patrociandor = Patrocinador::findOrFail($id);

        return redirect()->route('patrocinadors.index')->with('toast_success', 'Datos Actualizados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patrocinador  $patrocinador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patrocinador $patrocinador)
    {
        Storage::delete('public/' . $patrocinador->imagen);
        $patrocinador->delete();
        return redirect()->route('patrocinadors.index');
    }
}
