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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

    <header class="header">

        <h1>#ReforestaChallenge</h1>
        <a href="#eventos" class=" btn btn-secondary btn-lg mt-5">Eventos</a>
        <a href="{{ url('eventoPasado')}}" class=" btn btn-secondary btn-lg mt-5">Eventos Pasados</a>
        <a href="{{ url('nuestroArbol')}}" class=" btn btn-secondary btn-lg mt-5">Nuestros Árboles</a>

    </header>


    <div class="container ">
        <div class="row mt-5 align-items-center justify-content-between">
            <div class="col-12 col-md-6 ">
                <img src="img/bosque-2.jpg" alt="" width="450px" height="400px">
            </div>

            <div class="col-12 col-md-4 col-lg-6">
                <p class="text-justify lead">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                    leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                    with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                    publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
            </div>
        </div>

        <div class="row my-5 align-items-center justify-content-between">

            <div class="col-12 col-md-4 col-lg-6">
                <p class="text-justify lead">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                    leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                    with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                    publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
            </div>
            <div class="col-12 col-md-6 ">
                <img src="img/bosque-2.jpg" alt="" width="450px" height="400px">
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="text-center my-4">
                    <h2>Árboles Plantados</h2>
                    <h3 class="contador">{{$contador[0]->arbolesSembrados}}</h3>
                    <img src="img/undraw_environment_iaus.png" alt="" width="400px" height="250px">
                </div>
            </div>
            <div class="col-12">
                <div>
                    <h2>Patrocinadores y Colaboradores</h2>
                    <div class="d-flex justify-content-center align-items-center flex-wrap">
                        @foreach ($patrocinador as $patrocinadores)
                        <a href="{{$patrocinadores->urlPatrocinio}}" target="_blank" title="Ver información"><img
                                src="{{Storage::url($patrocinadores->imagen)}}" alt="" class="" width="200px"
                                height="100px" style="margin: 10px"></a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>


        <div id="eventos" class="m-5">
            {{--video 14 carpeta 31  --}}
            <h2 class="mb-5">Próximos Eventos</h2>
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

    </div>

    @include('partial.footer')

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>