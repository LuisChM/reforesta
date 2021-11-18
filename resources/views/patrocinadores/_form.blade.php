@csrf
<div class="form-group">
    <label for="imagen">Seleccione una imagen para guardar:</label>
    <!-- Button trigger modal -->
    <button type="button" class="btn " data-toggle="modal" data-target="#exampleModalCenter">
        <img src="{{ Storage::url($patrocinador->imagen) }}" alt="Todavia no hay una imagen" width="250px" height="300px">
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content  bg-none border-0">
                <div class="modal-header border-0">
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white font-weight-bold">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="{{ Storage::url($patrocinador->imagen) }}" alt="" style="width:100%;height:100%;">
                    {{-- <img src="/storage/{{$patrocinador->imagen}}" alt="" style="width:100%;height: 100%;"> --}}
                </div>
            </div>
        </div>
    </div>
    <input type="file" class="form-control-file @error('imagen') is-invalid @enderror" name="imagen" id="imagen" accept="image/*">
    @error('imagen')
    <span class="invalid-feedback" role="alert">
        <strong>{{$message}}</strong>
    </span>
    @enderror
</div>

<div class="form-group">
    <label for="nombrePatrocinador">Nombre del patrocinador:</label>
    <input type="text" class="form-control  @error('nombrePatrocinador') is-invalid @enderror" name="nombrePatrocinador"
        id="nombrePatrocinador" placeholder="Ingrese el nombre del patrocinador"
        value="{{old('nombrePatrocinador', $patrocinador->nombrePatrocinador)}}">
    @error('nombrePatrocinador')
    <span class="invalid-feedback" role="alert">
        <strong>{{$message}}</strong>
    </span>
    @enderror
</div>

<div class="form-group">
    <label for="urlPatrocinio">URL del patrocinador:</label>
    <input type="url" class="form-control  @error('urlPatrocinio') is-invalid @enderror" name="urlPatrocinio"
        id="urlPatrocinio" placeholder="https://example.com"
        value="{{old('urlPatrocinio', $patrocinador->urlPatrocinio)}}">
    @error('urlPatrocinio')
    <span class="invalid-feedback" role="alert">
        <strong>{{$message}}</strong>
    </span>
    @enderror
</div>


<div class="d-flex justify-content-end mt-5">
    <a class="btn btn-primary mr-3" href="{{route('patrocinadors.index')}}" role="button">Volver</a>
    <button class="btn btn-success text-white">{{$btnText ?? ''}}</button>
</div>