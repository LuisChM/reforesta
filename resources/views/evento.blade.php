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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
        integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
        crossorigin="" />
    <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@2.2.9/dist/esri-leaflet-geocoder.css"
        integrity="sha512-v5YmWLm8KqAAmg5808pETiccEohtt8rPVMGQ1jA6jqkWVydV5Cuz3nJ9fQ7ittSxvuqsvI9RSGfVoKPaAJZ/AQ=="
        crossorigin="">
</head>

<body>
    <header class="header">

        <div class="text-center pt-5 justify-content-center">
            <h1 class="text-white text-uppercase">Detalle del evento</h1>
        </div>

    </header>
    <div class="container mt-4">
        <h3 class="text-center">{{$evento->tema}}</h3>

        <p>{{$evento->descripcion}}</p>
        <p>Direccion: {{$evento->direccion}}, {{$evento->distrito}}</p>
        <p>Fecha: {{$evento->fecha}}</p>
        <p>Hora: {{$evento->hora}}</p>

        <h1>Aqui el mapa</h1>

        <div class="form-group">
            <div id="mapa" style="height: 400px;"></div>
        </div>
        <input type="hidden" name="lat" id="lat" value="{{$evento->lat}}">
        <input type="hidden" name="lng" id="lng" value="{{$evento->lng}}">
    </div>

    <footer class="footer">
        <div class="contenedor">
            <div class="barra text-center">
                <span class="text-black-50 texto-footer"> +506 2101-5332 | ronny@gaia.gives</span>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
        integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
        crossorigin=""></script>
    <script src="https://unpkg.com/esri-leaflet@2.1.4/dist/esri-leaflet.js"
        integrity="sha512-m+BZ3OSlzGdYLqUBZt3u6eA0sH+Txdmq7cqA1u8/B2aTXviGMMLOfrKyiIW7181jbzZAY0u+3jWoiL61iLcTKQ=="
        crossorigin=""></script>
    <script src="https://unpkg.com/esri-leaflet-geocoder@2.2.9/dist/esri-leaflet-geocoder.js"
        integrity="sha512-QXchymy6PyEfYFQeOUuoz5pH5q9ng0eewZN8Sv0wvxq3ZhujTGF4eS/ySpnl6YfTQRWmA2Nn3Bezi9xuF8yNiw=="
        crossorigin=""></script>
</body>

</html>