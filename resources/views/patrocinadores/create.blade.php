@extends('adminlte::page')

@section('title', 'Patrocinadores')

@section('content_header')
    <h1>Patrocinadores</h1>
@stop

@section('content')
    <div class="container mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">

                    <form class="mt-4" enctype="multipart/form-data" action="{{ route('patrocinadors.store') }}" method="POST">
                        @include('patrocinadores._form',['btnText'=>'Guardar'])

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
