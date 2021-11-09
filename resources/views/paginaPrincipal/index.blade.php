@extends('adminlte::page')

@section('title', 'Pagina Principal')

@section('content_header')
<h1>Pagina Principal</h1>
@stop

@section('content')
{{-- {{dd($paginaPrincipal)}} --}}
<div class="container">
    @if ($paginaPrincipal->isEmpty())
    <a class="btn btn-success mb-3" href="{{ route('paginaPrincipals.create') }}" role="button">Datos página
        principal</a>
    @else
    @foreach ($paginaPrincipal as $paginaPrincipals)
    <h3>Sobre Nosotros</h3>
    <p>{{$paginaPrincipals->nosotros}}</p>
    <h3>Misión</h3>
    <p>{{$paginaPrincipals->mision}}</p>
    <h3>Visión</h3>
    <p>{{$paginaPrincipals->vision}}</p>

    <a href="{{route('paginaPrincipals.edit', Crypt::encrypt($paginaPrincipals->id))}}"
    @endforeach
        class="btn btn-primary btn-sm">Editar</a>
    @endif

</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@stop

@section('js')
<script src="{{ asset('js/app.js') }}"></script>
@stop