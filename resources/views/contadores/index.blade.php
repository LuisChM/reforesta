@extends('adminlte::page')

@section('title', 'Contador')

@section('content_header')
<h1>Contador</h1>
@stop

@section('content')

<div class="container">
    <h2>Arboles Sembrados</h2>
    <p>{{$contador[0]->arbolesSembrados}}</p>

    <a href="{{route('contadors.edit', Crypt::encrypt($contador[0]->id))}}" class="btn btn-primary btn-sm">Editar</a>

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