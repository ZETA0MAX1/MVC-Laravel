<div class="modal-header">
    <h4 class="modal-title">Editar Categorias</h4>
</div>
<form action="" id="formulario-editar" autocomplete="off">
    @method('PATCH')
    <div class="modal-body">
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="CategoriaNombre">Nombre</label>
            <div class="col-sm-8">
                <input type="text" name="CategoriaNombre" id="CategoriaNombre" class="form-control" value="{{ $item->CategoriaNombre }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="Description">Descripción</label>
            <div class="col-sm-8">
                <textarea name="Description" id="Description" class="form-control" rows="3" required>{{ $item->Description }}</textarea>
            </div>
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">
            <i class="fas fa-window-close"></i> Cerrar
        </button>
        <button id="btn-submit" type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Actualizar
        </button>
    </div>
</form>
<script>
    document.getElementById("formulario-editar").addEventListener('submit', function(evento) {
        evento.preventDefault();
        actualizar({{ $item->CategoriaID }});
    });
</script>
