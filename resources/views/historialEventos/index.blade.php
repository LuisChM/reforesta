@extends('adminlte::page')

@section('title', 'Eventos')

@section('content_header')
<h1>Eventos</h1>
@stop

@section('content')
<div class="d-flex justify-content-end align-content-center">
    <form class="form-inline">
        <div class="form-group mx-sm-3 m-4">
            <input type="search" class="form-control searchInput" name="buscarpor" aria-label="Search" placeholder="Buscar eventos">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Buscar</button>
    </form>
</div>
<div class="table-responsive">
    <table class="table table-light text-center">
        <thead class="thead-light">
            <tr>
                <th scope="col">Tema</th>
                <th scope="col">Descripción</th>
                <th scope="col">Fecha</th>
                <th scope="col">Hora Inicio</th>
                <th scope="col">Hora Finaliza</th>
                <th scope="col">Estado</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($evento as $eventos)

            <tr>
                <td>{{ $eventos->tema }}</td>
                <td class="text-truncate d-inline-block" style="max-width: 300px;">{{ $eventos->descripcion }}</td>
                <td>{{ $eventos->fecha }}</td>
                <td>{{ $eventos->horaInicio }}</td>
                <td>{{ $eventos->horaFinaliza }}</td>
                <td>{{ $eventos->estado }}</td>
                <td>
                    <div class="d-flex justify-content-around">
                        {{-- seleccionar dato por id y editarlo --}}
                        <a href="{{route('eventos.edit', Crypt::encrypt($eventos->id))}}" class="btn btn-primary btn-sm">Editar</a>

                        {{-- seleccionar dato por id y eliminarlo --}}

                        <form method="Post" action="{{route('eventos.destroy',$eventos)}}">
                            @csrf @method('delete')
                            <button class="btn btn-danger btn-sm delete-confirm" type="submit">Eliminar</button>
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
<script src="{{ asset('js/app.js') }}"></script>
@stop
