@extends('adminlte::page')

@section('title', 'Patrocinadores')

@section('content_header')
    <h1>Patrocinadores</h1>
@stop

@section('content')

<div class="d-flex justify-content-end align-content-center">
    <form class="form-inline">
        <div class="form-group mx-sm-3 m-2">
            <input type="search" class="form-control searchInput" name="buscarpor" aria-label="Search" placeholder="Buscar Patrocinadores" >
    </div>
    <button type="submit" class="btn btn-primary mb-2">Buscar</button>
</form>
</div>
<a class="btn btn-success" href="{{ route('patrocinadors.create') }}" role="button">Agregar nuevo dato</a>
    <div class="table-responsive">
        <table class="table table-light text-center mt-4">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Imagen</th>
                    <th scope="col">Patrocinador</th>
                    <th scope="col">URL</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patrocinador as $patrocinadores) 

                    <tr>
                        <td ><img src="{{ Storage::url($patrocinadores->imagen) }}" alt="Sin imagen guardada" width="150px" height="150px"></td>
                        <td>{{ $patrocinadores->nombrePatrocinador }}</td>
                        <td>{{ $patrocinadores->urlPatrocinio }}</td>
                        <td>
                            <div class="d-flex justify-content-around">
                                {{-- seleccionar dato por id y editarlo --}}
                                <a href="{{route('patrocinadors.edit', Crypt::encrypt($patrocinadores->id))}}" class="btn btn-primary btn-sm">Editar</a>

                                {{-- seleccionar dato por id y eliminarlo --}}

                                <form method="Post" action="{{route('patrocinadors.destroy',$patrocinadores)}}">
                            @csrf @method('delete')
                            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                        </form>
                            </div>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>

        {{ $patrocinador->links() }}


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
