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
        @foreach($categorias as $categoria)
            <tr>
                <td>{{ $categoria->CategoriaID }}</td>
                <td>{{ $categoria->CategoriaNombre }}</td>
                <td>{{ $categoria->Description }}</td>
                <td>
                    <button class="btn btn-sm btn-primary">Editar</button>
                    <button class="btn btn-sm btn-danger">Eliminar</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
