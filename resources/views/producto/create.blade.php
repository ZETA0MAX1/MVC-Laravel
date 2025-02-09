<div class="modal-header">
    <h4 class="modal-title">Registrar Producto</h4>
</div>
<form action="" method="POST" id="formulario-crear" autocomplete="off">
    @csrf
    <div class="modal-body">
        <!-- Campo Nombre Producto -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="nombreProducto">Nombre del Producto</label>
            <div class="col-sm-8">
                <input type="text" name="nombreProducto" id="nombreProducto" class="form-control" required maxlength="255">
            </div>
        </div>

            <!-- Campo Cantidad -->
    <div class="form-group row">
        <label class="col-sm-4 col-form-label" for="Cantidad">Cantidad</label>
        <div class="col-sm-8">
            <input type="number" name="Cantidad" id="Cantidad" class="form-control" required min="1">
        </div>
    </div>

    <!-- Campo Precio -->
    <div class="form-group row">
        <label class="col-sm-4 col-form-label" for="Precio">Precio</label>
        <div class="col-sm-8">
            <input type="number" step="0.01" name="Precio" id="Precio" class="form-control" required min="0">
        </div>
    </div>

        <!-- Selección de Categoría -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="CategoriaID">Categoría</label>
            <div class="col-sm-8">
                <select name="CategoriaID" id="CategoriaID" class="form-control" required>
                    <option value="">Seleccionar Categoría</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->CategoriaID }}">{{ $categoria->CategoriaNombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Selección de Proveedor -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="ProveedorID">Proveedor</label>
            <div class="col-sm-8">
                <select name="ProveedorID" id="ProveedorID" class="form-control" required>
                    <option value="">Seleccionar Proveedor</option>
                    @foreach($proveedores as $proveedor)
                        <option value="{{ $proveedor->ProveedorID }}">{{ $proveedor->ProveedorNombre }}</option>
                    @endforeach
                </select>
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
