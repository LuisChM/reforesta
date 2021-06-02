@extends('adminlte::page')

@section('title', 'Datos de Arboles')

@section('content_header')
    <h1>Datos de Arboles</h1>
@stop

@section('content')
    <div class="d-flex justify-content-end mb-3">
        <a class="btn btn-success mb-3" href="{{ route('datosArbols.create') }}" role="button">Agregar nuevo dato</a>
    </div>
    <div class="table-responsive">
        <table class="table table-light text-center">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Foto</th>
                    <th scope="col">Nombre Popular</th>
                    <th scope="col">Nombre Científico</th>
                    <th scope="col">Descripción</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datosArbol as $datosArboles) 

                    <tr>
                        <td ><img src="{{ Storage::url($datosArboles->imagen) }}" alt="" width="150px" height="150px"></td>
                        <td>{{ $datosArboles->nombrePopular }}</td>
                        <td>{{ $datosArboles->nombreCientifico }}</td>
                        <td>{{ $datosArboles->descripcion }}</td>
                        <td>
                            <div class="d-flex justify-content-around">
                                {{-- seleccionar dato por id y editarlo --}}
                                <a href="{{route('datosArbols.edit', $datosArboles)}}" class="btn btn-primary btn-sm">Editar</a>

                                {{-- seleccionar dato por id y eliminarlo --}}

                                <form method="Post" action="{{route('datosArbols.destroy',$datosArboles)}}">
                            @csrf @method('delete')
                            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                        </form>
                            </div>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>

        {{ $datosArbol->links() }}


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
