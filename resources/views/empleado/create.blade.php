<div class="modal-header">
    <h4 class="modal-title">Registrar Empleado</h4>
</div>
<form action="" id="formulario-crear" autocomplete="off">
    @csrf
    <div class="modal-body">
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="Empleadonombre">Empleadonombre</label>
            <div class="col-sm-8">
                <input type="text" name="Empleadonombre" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="fecha_nacimiento">Fecha de Nacimiento</label>
            <div class="col-sm-8">
                <input type="date"
                       name="fecha_nacimiento"
                       id="fecha_nacimiento"
                       class="form-control"
                       placeholder="Seleccione una fecha"
                       required />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="foto">foto</label>
            <div class="col-sm-8">
                <input type="text" name="foto" class="form-control" required>
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
    document.addEventListener('DOMContentLoaded', function() {
    flatpickr("#fecha_nacimiento", {
        locale: "es",
        dateFormat: "Y-m-d",
        maxDate: new Date(), // No permite fechas futuras
        allowInput: true,
        altInput: true,
        altFormat: "d/m/Y",
    });
});
</script>
