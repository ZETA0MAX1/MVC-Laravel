<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($categorias as $categoria)
            <tr>
                <td>{{ $categoria->CategoriaID }}</td>
                <td>{{ $categoria->CategoriaNombre }}</td>
                <td>{{ $categoria->Description }}</td>
                <td>
                    <button class="btn btn-sm btn-primary" onclick="modalEditar({{ $categoria->CategoriaID }})">Editar</button>
                    <button class="btn btn-sm btn-danger" onclick="confirmarEliminar({{ $categoria->CategoriaID }})">
                        Eliminar
                    </button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">No se encontraron resultados</td>
            </tr>
        @endforelse
    </tbody>
</table>
