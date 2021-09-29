@extends('adminlte::page')

@section('title', 'Contador')

@section('content_header')
<h1>Contador</h1>
@stop

@section('content')
{{-- {{dd($contador)}} --}}
<div class="container">
    <h2>Arboles Sembrados</h2>

    @if (count($contador) >= 1)
    @foreach ($contador as $item)

    <p>{{$item->arbolesSembrados}}</p>
    <a href="{{route('contadors.edit', Crypt::encrypt($item->id))}}" class="btn btn-primary btn-sm">Editar</a>

    @endforeach
    @else
    <a class="btn btn-success mb-3" href="{{ route('eventos.create') }}" role="button">Iniciar el contador</a>

    @endif

</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@stop

@section('js')
<script>

</script>
@stop