<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top" id="banner">
            <div class="container">
                <!-- Toggler/collapsibe Button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar links -->
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#eventos">Eventos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('eventoPasado')}}">Eventos Pasados</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('nuestroArbol')}}">Nuestros Árboles</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="banner">
        <div class="container">
            <div class="banner-text">
                <div class="banner-heading ">
                    #ReforestaChallenge
                </div>
            </div>
        </div>
    </div>

    <main class="container">
        <article class="mt-5">
            <h2 class="font-weight-bold text-center mt-5 mt-lg-0 mb-3">Sobre Nosotros</h2>
            @if (!is_null($paginaPrincipal))
            <p class="text-center">{{$paginaPrincipal->nosotros}}</p>
            @endif
        </article><!-- /article sobre nosotros -->

        <section class="section-margin">
            <div class="row d-flex flex-sm-row flex-wrap flex-column justify-content-around align-items-center">
                <div class="col-lg-7 centrar-imagen">
                    <img class="imagen-main " src="img/ecology.jpg" alt="">
                </div>
                <div class="col-lg-5">
                    <h2 class="font-weight-bold text-center mt-5 mt-lg-0">Misión</h2>
                    @if (!is_null($paginaPrincipal))
                    <p class="text-center">{{$paginaPrincipal->mision}}</p>
                    @endif
                </div>
            </div>
        </section><!-- /sectio mision  -->

        <section class="section-margin">
            <div class="row d-flex flex-lg-row flex-column-reverse justify-content-around align-items-center">
                <div class="col-lg-5">
                    <h2 class="font-weight-bold text-center mt-5 mt-lg-0">Visión</h2>
                    @if (!is_null($paginaPrincipal))
                    <p class="text-center">{{$paginaPrincipal->vision}}</p>
                    @endif
                </div>
                <div class="col-lg-7 centrar-imagen d-flex justify-content-lg-end">
                    <img class="imagen-main" src="img/plant.jpg" alt="">
                </div>
            </div>
        </section><!-- /section vision -->

        <section class="section-margin d-flex justify-content-center align-items-center flex-column">
            <h2 class="font-weight-bold text-center mt-5 mt-lg-0">Árboles Plantados</h2>
            {{-- validar si hay datos en el contador --}}
            @if (is_null($contador))
            <h3 class="my-5"> Pronto estará disponible la cantidad de árboles que hemos plantado juntos</h3>
            @else
            <p class="numero-contador">{{$contador->arbolesSembrados}}</p>
            @endif
            <img src="img/hands-plant.jpg" alt="" class="imagen-contador">
        </section><!-- /section arboles plantados -->

        @if (!$patrocinador->isEmpty())
        <section class="section-margin">
            <h2 class="font-weight-bold text-center mt-5 mt-lg-0">Patrocinadores y Colaboradores</h2>
            <div class="d-flex justify-content-center align-items-center flex-wrap">
                @foreach ($patrocinador as $patrocinadores)
                <a href="{{$patrocinadores->urlPatrocinio}}" target="_blank" title="Ver información"><img
                        src="{{Storage::url($patrocinadores->imagen)}}" alt="" class="" width="200px" height="100px"
                        style="margin: 10px"></a>
                @endforeach
            </div>
        </section><!-- /section patrocinadores y colaboradores -->
        @endif

        <section class="section-margin" id="eventos">
            <h2 class="font-weight-bold text-center mt-5 mt-lg-0">Próximos Eventos</h2>
            {{--video 14 carpeta 31 --}}
            <div class="row">
                <div class="col">
                    <div class="d-flex justify-content-around flex-wrap">
                        @if ($evento->isEmpty())
                        <h3 class="my-5">Los eventos con los que esperamos contar con su participación se mostrarán aqui
                            próximamente
                        </h3>
                        @else

                        @foreach ($evento as $eventos)
                        <div class="card mb-3" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{$eventos->tema}}</h5>
                                <p class="card-text">Fecha: {{$eventos->fecha}}</p>
                                <p class="card-text">Hora Inicio: {{$eventos->horaInicio}}</p>
                                <p class="card-text">Hora Finaliza: {{$eventos->horaFinaliza}}</p>
                                <p class="card-text">Punto de encuentro: {{$eventos->direccion}}</p>
                                <a href="{{ url('detalleEvento/'.Crypt::encrypt($eventos->id))}}"
                                    class="btn btn-primary">Ver detalles</a>

                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </section><!-- /section proximos eventos -->
    </main>

    @include('partial.footer')

    <script src="{{ asset('js/app.js') }}"></script>

</body>

</html>