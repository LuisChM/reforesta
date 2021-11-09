@extends('adminlte::page')

@section('title', 'Datos de Arboles')

@section('content_header')
    <h1>Datos de Arboles</h1>
@stop

@section('content')

{{-- {{dd($datosArbol)}} --}}

<div class="d-flex justify-content-end align-content-center">
    <form class="form-inline">
        <div class="form-group mx-sm-3 m-2">
            <input type="search" class="form-control searchInput" name="buscarpor" aria-label="Search" placeholder="Buscar datos de arboles" >
    </div>
    <button type="submit" class="btn btn-primary mb-2">Buscar</button>
</form>
</div>
<a class="btn btn-success" href="{{ route('datosArbols.create') }}" role="button">Agregar nuevo dato</a>
    <div class="table-responsive">
        <table class="table table-light text-center mt-4">
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
                        <td ><img src="{{ Storage::url($datosArboles->imagen) }}" alt="Sin imagen guardada" width="150px" height="150px"></td>
                        <td>{{ $datosArboles->nombrePopular }}</td>
                        <td>{{ $datosArboles->nombreCientifico }}</td>
                        <td id="Ellipsis-ex" class="text-truncate" style="max-width: 150px;">{{ $datosArboles->descripcion }}</td>
                        <td>
                            <div class="d-flex justify-content-around">
                                {{-- seleccionar dato por id y editarlo --}}
                                <a href="{{route('datosArbols.edit', Crypt::encrypt($datosArboles->id))}}" class="btn btn-primary btn-sm">Editar</a>

                                {{-- seleccionar dato por id y eliminarlo --}}

                                <form method="Post" action="{{route('datosArbols.destroy',$datosArboles)}}">
                            @csrf @method('delete')
                            <button class="btn btn-danger btn-sm delete-confirm" type="submit">Eliminar</button>
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
    <script src="{{ asset('js/app.js') }}"></script>
    @stop