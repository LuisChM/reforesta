@extends('adminlte::page')

@section('title', 'Datos de Arboles')

@section('content_header')
<h1>Contador</h1>
@stop

@section('content')

<div class="container mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <form class="mt-4" action="{{ route('contadors.update', $contador) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="arbolesSembrados">Cantidad de arboles sembrados:</label>
                        <input type="number" class="form-control @error('arbolesSembrados') is-invalid @enderror" min="0"
                            name="arbolesSembrados" id="arbolesSembrados"
                            value="{{old('arbolesSembrados', $contador->arbolesSembrados)}}">
                        @error('arbolesSembrados')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end mt-5">
                        <a class="btn btn-primary mr-3" href="{{route('contadors.index')}}" role="button">Volver</a>
                        <button class="btn btn-success text-white">Actualizar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
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