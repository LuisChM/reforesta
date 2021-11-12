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

    <div class="album py-5 bg-light">
        <div class="container">
            <h2 class="font-weight-bold text-center mt-5 mt-lg-0 mb-3">Nuestros Árboles</h2>
            <div class="row">
                <div class="d-flex justify-content-around flex-wrap p-5">
                    @foreach ($datosArbol as $datosArbols)
                    <div class="col-lg-4 col-md-6 ">
                        <div class="card mb-4 box-shadow">
                            <!-- Button trigger modal -->
                            <a href="" data-toggle="modal" data-target="#ModalShow{{$datosArbols->id}}"><img
                                    class="card-img-top" src="{{ Storage::url($datosArbols->imagen) }}" width="250px"
                                    height="300px" alt="Card image cap"></a>
                            <div class="card-body">
                                <p class="card-text text-truncate" id="Ellipsis-ex" style="max-width: 250px;">
                                    {{$datosArbols->nombrePopular}}</p>
                                <p class="card-text text-truncate" id="Ellipsis-ex" style="max-width: 250px;">
                                    {{$datosArbols->nombreCientifico}}</p>
                                <a href="" data-toggle="modal" class="btn btn-lg btn-block btn-outline-secondary"
                                    data-target="#ModalShow{{$datosArbols->id}}">
                                    Ver más</a>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="ModalShow{{$datosArbols->id}}" tabindex="-1" role="dialog"
                        aria-labelledby="ModalShowLabel{{$datosArbols->id}}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content  bg-none border-0">
                                <div class="modal-header border-0">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <img src="{{ Storage::url($datosArbols->imagen) }}" alt=""
                                        style="width:100%;height: 100%;">
                                    <p>{{$datosArbols->nombrePopular}}</p>
                                    <p>{{$datosArbols->nombreCientifico}}</p>
                                    <p>{{$datosArbols->descripcion}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <span class="text-muted">+506 2101-5332 | ronny@gaia.gives</span>
        </div>
    </footer>

</body>

</html>