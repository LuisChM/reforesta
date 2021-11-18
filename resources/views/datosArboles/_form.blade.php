@csrf
<div class="form-group">
    <label for="imagen">Seleccione una imagen para guardar:</label>
    <!-- Button trigger modal -->
    <button type="button" class="btn " data-toggle="modal" data-target="#exampleModalCenter">
        <img src="{{ Storage::url($datosArbol->imagen) }}" alt="Todavia no hay una imagen" width="250px" height="300px">
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
                    <img src="{{ Storage::url($datosArbol->imagen) }}" alt="" style="width:100%;height:100%;">
                    {{-- <img src="/storage/{{$datosArbol->imagen}}" alt="" style="width:100%;height: 100%;"> --}}
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
    <label for="nombrePopular">Nombre Popular:</label>
    <input type="text" class="form-control  @error('nombrePopular') is-invalid @enderror" name="nombrePopular"
        id="nombrePopular" placeholder="Ingrese el nombre popular del árbol"
        value="{{old('nombrePopular', $datosArbol->nombrePopular)}}">
    @error('nombrePopular')
    <span class="invalid-feedback" role="alert">
        <strong>{{$message}}</strong>
    </span>
    @enderror
</div>

<div class="form-group">
    <label for="nombreCientifico">Nombre Cientifico:</label>
    <input type="text" class="form-control  @error('nombreCientifico') is-invalid @enderror" name="nombreCientifico"
        id="nombreCientifico" placeholder="Ingrese el nombre cientifico del árbol"
        value="{{old('nombreCientifico', $datosArbol->nombreCientifico)}}">
    @error('nombreCientifico')
    <span class="invalid-feedback" role="alert">
        <strong>{{$message}}</strong>
    </span>
    @enderror
</div>


<div class="form-group">
    <label for="descripcion">Descripción</label>
    <textarea class="form-control" name="descripcion" id="descripcion" rows="3"
        placeholder="Ingrese una descripción">{{old('descripcion', $datosArbol->descripcion)}}</textarea>
</div>


<div class="d-flex justify-content-end mt-5">
    <a class="btn btn-primary mr-3" href="{{route('datosArbols.index')}}" role="button">Volver</a>
    <button class="btn btn-success text-white">{{$btnText ?? ''}}</button>
</div>