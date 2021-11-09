@extends('adminlte::page')

@section('title', 'Pagina Principal')

@section('content_header')
<h1>Pagina Principal</h1>
@stop

@section('content')

<div class="container mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <form class="mt-4" action="{{ route('paginaPrincipals.update', $paginaPrincipal) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="nosotros">Sobre Nosotros</label>
                        <textarea class="form-control @error('nosotros') is-invalid
                        @enderror" name="nosotros" id="nosotros" rows="3"
                            placeholder="Ingrese una descripción" >{{old('nosotros', $paginaPrincipal->nosotros)}}</textarea>
                        @error('nosotros')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="mision">Misón</label>
                        <textarea class="form-control @error('mision') is-invalid
                        @enderror" name="mision" id="mision" rows="3"
                            placeholder="Ingrese una descripción">{{old('mision', $paginaPrincipal->mision)}}</textarea>
                            @error('mision')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="vision">Visón</label>
                        <textarea class="form-control @error('vision') is-invalid
                        @enderror" name="vision" id="vision" rows="3"
                            placeholder="Ingrese una descripción">{{old('vision', $paginaPrincipal->vision)}}</textarea>
                            @error('vision')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="d-flex justify-content-end mt-5">
                        <a class="btn btn-primary mr-3" href="{{route('paginaPrincipals.index')}}"
                            role="button">Volver</a>
                        <button class="btn btn-success text-white">Guardar</button>
                        {{-- {{dd($paginaPrincipal)}} --}}

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