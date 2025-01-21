<div class="modal-header">
    <h4 class="modal-title">Registrar Proveedores</h4>
</div>
<form action="" id="formulario-crear" autocomplete="off">
    <div class="modal-body">
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="ProveedorNombre">ProveedorNombre</label>
            <div class="col-sm-8">
                <input type="text" name="ProveedorNombre" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="Direccion">Direccion</label>
            <div class="col-sm-8">
                <input type="text" name="Direccion" id="Direccion" class="form-control" required />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="Ciudad">Ciudad</label>
            <div class="col-sm-8">
                <input type="text" name="Ciudad" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="ContactoNombre">ContactoNombre</label>
            <div class="col-sm-8">
                <input type="text" name="ContactoNombre" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="Pais">Pais</label>
            <div class="col-sm-8">
                <input type="text" name="Pais" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="Celular">Celular</label>
            <div class="col-sm-8">
                <input type="number" name="Celular" class="form-control">
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
