<?php

namespace App\Http\Controllers;

use App\Paginaprincipal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\SavePaginaPrincipalRequest;

class PaginaprincipalController extends Controller
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
    public function index()
    {
        $paginaPrincipal = Paginaprincipal::all();
        return view('paginaPrincipal.index', compact('paginaPrincipal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paginaPrincipal.create', [
            'paginaPrincipal' => new Paginaprincipal
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SavePaginaPrincipalRequest $request)
    {
        Paginaprincipal::create($request->validated());
        return redirect()->route('paginaPrincipals.index')->with('toast_success', 'Datos Creados');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PaginaPrincipal  $paginaPrincipal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id =  Crypt::decrypt($id);
        $paginaPrincipal = Paginaprincipal::find($id);
        return view('paginaPrincipal.edit', compact('paginaPrincipal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PaginaPrincipal  $paginaPrincipal
     * @return \Illuminate\Http\Response
     */
    public function update(SavePaginaPrincipalRequest $request, Paginaprincipal $paginaPrincipal)
    {
        $paginaPrincipal->update($request->validated());
        return redirect()->route('paginaPrincipals.index')->with('toast_success', 'Datos Actualizados');
    }
}
