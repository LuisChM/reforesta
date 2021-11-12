<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Krub:wght@400;600&display=swap" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    @include('partial.heroNav',['titulo'=>'#ReforestaChallenge'])

    <div class="container p-5 " style="padding-top: 80px">
        <div id="eventos" class="m-5">
            <h2 class="font-weight-bold text-center mt-3 mt-lg-0 mb-3">Eventos Pasados</h2>
            <div class="row">
                <div class="col">
                    <div class="d-flex justify-content-around flex-wrap">
                        @foreach ($evento as $eventos)
                        <div class="card mb-3" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{$eventos->tema}}</h5>
                                <p class="card-text">Fecha: {{$eventos->fecha}}</p>
                                <p class="card-text">Hora: {{$eventos->hora}}</p>
                                <p class="card-text">Punto de encuentro: {{$eventos->direccion}}</p>
                                <a href="{{ url('detalleEvento/'.Crypt::encrypt($eventos->id))}}"
                                    class="btn btn-primary">Ver detalles</a>

                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
    @include('partial.footer')


    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>