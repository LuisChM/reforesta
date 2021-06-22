@extends('adminlte::page')

@section('title', 'Eventos')

@section('content_header')
    <h1>Eventos</h1>
@stop

@section('content')
    <div class="d-flex justify-content-end mb-3">
        <a class="btn btn-success mb-3" href="{{ route('eventos.create') }}" role="button">Agregar nuevo dato</a>
    </div>
    <div class="table-responsive">
        <table class="table table-light text-center">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Tema</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Estado</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($evento as $eventos) 

                    <tr>
                        <td>{{ $eventos->tema }}</td>
                        <td>{{ $eventos->descripcion }}</td>
                        <td>{{ $eventos->fecha }}</td>
                        <td>{{ $eventos->hora }}</td>
                        <td>{{ $eventos->estado }}</td>
                        <td>
                            <div class="d-flex justify-content-around">
                                {{-- seleccionar dato por id y editarlo --}}
                                <a href="{{route('eventos.edit', $eventos)}}" class="btn btn-primary btn-sm">Editar</a>

                                {{-- seleccionar dato por id y eliminarlo --}}

                                <form method="Post" action="{{route('eventos.destroy',$eventos)}}">
                            @csrf @method('delete')
                            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                        </form>
                            </div>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>

        {{ $evento->links() }}


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
