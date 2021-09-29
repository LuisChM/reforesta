@csrf
<div class="form-group">
    <label for="tema">Tema:</label>
    <input type="text" class="form-control  @error('tema') is-invalid @enderror" name="tema" id="tema"
        placeholder="Ingrese el tema" value="{{old('tema', $evento->tema)}}">
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
    <p class="text-secondary m-3 text-center">El asistente colocara una dirección estimada o mueve el PIN hacia el lugar
        deseado </p>
</div>

<div class="form-group">
    <div id="map" style="height: 400px;"></div>
</div>

<div class="form-group">
    <label for="direccion">Dirección:</label>
    <input type="text" class="form-control  @error('direccion') is-invalid @enderror" name="direccion" id="direccion"
        placeholder="Dirección" value="{{old('direccion', $evento->direccion)}}">
    @error('direccion')
    <span class="invalid-feedback" role="alert">
        <strong>{{$message}}</strong>
    </span>
    @enderror
</div>
<div class="form-group">
    <label for="distrito">Distrito:</label>
    <input type="text" class="form-control  @error('distrito') is-invalid @enderror" name="distrito" id="distrito"
        placeholder="Dirección" value="{{old('distrito', $evento->distrito)}}">
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
    <input type="date" class="form-control  @error('fecha') is-invalid @enderror" name="fecha" id="fecha"
        placeholder="Ingrese la fecha" value="{{old('fecha', $evento->fecha)}}">
    @error('fecha')
    <span class="invalid-feedback" role="alert">
        <strong>{{$message}}</strong>
    </span>
    @enderror
</div>
<div class="form-group">
    <label for="horaInicio">Hora Inicio:</label>
    <input type="time" class="form-control  @error('hora') is-invalid @enderror" name="horaInicio" id="horaInicio"
        value="{{old('horaInico', $evento->horaInicio)}}">
    @error('horaInicio')
    <span class="invalid-feedback" role="alert">
        <strong>{{$message}}</strong>
    </span>
    @enderror
</div>
<div class="form-group">
    <label for="horaFinaliza">Hora Finaliza:</label>
    <input type="time" class="form-control  @error('hora') is-invalid @enderror" name="horaFinaliza" id="horaFinaliza"
        value="{{old('horaInico', $evento->horaFinaliza)}}">
    @error('horaFinaliza')
    <span class="invalid-feedback" role="alert">
        <strong>{{$message}}</strong>
    </span>
    @enderror
</div>

<div class="form-check form-check-inline d-flex flex-column align-items-start ">
    <label for="arboles">Arboles a plantar</label>
    <div>
    @foreach ($arboles as $id => $nombrePopular)
    {{-- {{dd($arboles)}} --}}
    <input class="form-check-input " type="checkbox" value="{{$id}}" name="arboles[]"
        {{$evento->arboles->pluck('id')->contains($id) ? 'checked' : ''}}>
    <label
        class="form-check-label pr-2 @error('arboles') is-invalid @else border-0 @enderror">{{$nombrePopular}} </label>
    @endforeach
    @error('arboles')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div></div>

{{-- 
    
    buscador a todos las opciones

    add cantidad de arboles en eventos
      
    
    --}}

<div class="form-group ">
    <label for="estado">Estado de la publicación</label>
    <br>
    <div class="form-check form-check-inline">
        <input checked class="form-check-input" type="radio" name="estado" id="inlineRadio1" value="borrador"
            {{ ($evento->estado=="borrador")? "checked" : "" }}>
        <label class="form-check-label" for="inlineRadio1">Borrador</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="estado" id="inlineRadio2" value="activo"
            {{ ($evento->estado=="activo")? "checked" : "" }}>
        <label class="form-check-label" for="inlineRadio2">Activo</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="estado" id="inlineRadio2" value="inactivo"
            {{ ($evento->estado=="inactivo")? "checked" : "" }}>
        <label class="form-check-label" for="inlineRadio2">Inactivo</label>
    </div>
</div>

<div class="d-flex justify-content-end m-5">
    <a class="btn btn-primary mr-3" href="{{route('eventos.index')}}" role="button">Volver</a>
    <button class="btn btn-success text-white">{{$btnText ?? ''}}</button>
</div>