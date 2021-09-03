<?php

namespace App\Http\Controllers;

use App\Evento;
use Illuminate\Http\Request;

class HistorialEventosController extends Controller
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
    public function index()
    {
        $evento = Evento::orderBy('created_at', 'ASC')->where('estado','inactivo')->paginate();
        return view('historialEventos.index', compact('evento'));
    }}
