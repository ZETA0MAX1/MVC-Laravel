<div class="modal-header">
    <h4 class="modal-title">Registrar Detalle Orden</h4>
</div>
<form action="" id="formulario-crear" autocomplete="off">
    <div class="modal-body">
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="OrdenID ">Orden </label>
            <div class="col-sm-8">
                <select name="OrdenID" id="OrdenID" class="form-control" required>
                    <option value="">Seleccionar Orden</option>
                    @foreach($ordenes as $orden)
                        <option value="{{ $orden->OrdenID}}">{{$orden->OrdenID}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="ProductoID">Productos</label>
            <div class="col-sm-8">
                <select name="ProductoID" id="ProductoID" class="form-control" required>
                    <option value="">Seleccionar Productos</option>
                    @foreach($productos as $producto)
                        <option value="{{ $producto->ProductoID }}">{{ $producto->nombreProducto }}</option>
                    @endforeach
                </select>
            </div>

        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="cantidad">Cantidad</label>
            <div class="col-sm-8">
                <input type="number" name="cantidad" id="cantidad" class="form-control" required>
            </div>
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">
            <i class="fas fa-window-close"></i> Cerrar
        </button>
        <button id="btn-submit" type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Registrar
        </button>
    </div>
</form>

<script>
    document.getElementById("formulario-crear").addEventListener('submit', function(evento) {
        evento.preventDefault();
        guardar();
    });

</script>
