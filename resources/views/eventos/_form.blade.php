@csrf

<div class="form-group">
    <label for="tema">Tema:</label>
    <input type="text" class="form-control  @error('tema') is-invalid @enderror" name="tema"
        id="tema" placeholder="Ingrese el tema"
        value="{{old('tema', $evento->tema)}}">
    @error('tema')
    <span class="invalid-feedback" role="alert">
        <strong>{{$message}}</strong>
    </span>
    @enderror
</div>

<div class="form-group">
    <label for="descripcion">Descripción</label>
    <textarea class="form-control" name="descripcion" id="descripcion" rows="3"
        placeholder="Ingrese una descripción">{{old('descripcion', $evento->descripcion)}}</textarea>
</div>

<div class="form-group">
    <label for="ubicacion">Ubicación:</label>
<input type="text" id="buscarUbicacion" class="form-control" placeholder="Coloca la dirección del evento">
<p class="text-secondary m-3 text-center">El asistente colocara una dirección estimada o mueve el PIN hacia el lugar deseado </p>
</div>

<div class="form-group">
    <div id="map" style="height: 400px;"></div>
</div>

<div class="form-group">
    <label for="direccion">Dirección:</label>
    <input type="text" class="form-control  @error('direccion') is-invalid @enderror" name="direccion"
        id="direccion" placeholder="Dirección"
        {{-- value="{{old('direccion', $evento->direccion)}}" --}}
        >
    @error('direccion')
    <span class="invalid-feedback" role="alert">
        <strong>{{$message}}</strong>
    </span>
    @enderror
</div>
<div class="form-group">
    <label for="distrito">Distrito:</label>
    <input type="text" class="form-control  @error('distrito') is-invalid @enderror" name="distrito"
        id="distrito" placeholder="Dirección"
        value="{{old('distrito', $evento->distrito)}}"
        >
    @error('distrito')
    <span class="invalid-feedback" role="alert">
        <strong>{{$message}}</strong>
    </span>
    @enderror
</div>

<input type="hidden" name="lat" id="lat" value="{{old('lat', $evento->lat)}}">
<input type="hidden" name="lng" id="lng" value="{{old('lng', $evento->lng)}}">


<div class="form-group">
    <label for="fecha">Fecha:</label>
    <input type="date" class="form-control  @error('fecha') is-invalid @enderror" name="fecha"
        id="fecha" placeholder="Ingrese la fecha"
        value="{{old('fecha', $evento->fecha)}}">
    @error('fecha')
    <span class="invalid-feedback" role="alert">
        <strong>{{$message}}</strong>
    </span>
    @enderror
</div>
<div class="form-group">
    <label for="hora">Hora:</label>
    <input type="time" class="form-control  @error('hora') is-invalid @enderror" name="hora"
        id="hora" placeholder="Ingrese la hora"
        value="{{old('hora', $evento->hora)}}">
    @error('hora')
    <span class="invalid-feedback" role="alert">
        <strong>{{$message}}</strong>
    </span>
    @enderror
</div>


<div class="d-flex justify-content-end mt-5">
    <a class="btn btn-primary mr-3" href="{{route('eventos.index')}}" role="button">Volver</a>
    <button class="btn btn-success text-white">{{$btnText ?? ''}}</button>
</div>