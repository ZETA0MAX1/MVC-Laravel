<div class="modal-header">
    <h4 class="modal-title">Registrar Clientes</h4>
</div>
<form action="" id="formulario-crear" autocomplete="off">
    <div class="modal-body">
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="ClienteID">Cliente</label>
            <div class="col-sm-8">
                <select name="ClienteID" id="ClienteID" class="form-control" required>
                    <option value="">Seleccionar Cliente</option>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->ClienteID }}">{{ $cliente->cLienteNombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="EmpleadoID">Empleado</label>
            <div class="col-sm-8">
                <select name="EmpleadoID" id="EmpleadoID" class="form-control" required>
                    <option value="">Seleccionar Empleado</option>
                    @foreach($empleados as $empleado)
                        <option value="{{ $empleado->EmpleadoID }}">{{ $empleado->Empleadonombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="TransportistaID">Transportista</label>
            <div class="col-sm-8">
                <select name="TransportistaID" id="TransportistaID" class="form-control" required>
                    <option value="">Seleccionar Transportista</option>
                    @foreach($transportistas as $transportista)
                        <option value="{{ $transportista->TransportistaID }}">{{ $transportista->NombreTransportista }}</option>
                    @endforeach
                </select>
            </div>

        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="fecha_orden">Fecha de Orden</label>
            <div class="col-sm-8">
                <input type="date" name="fecha_orden" id="fecha_orden" class="form-control" required>
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
