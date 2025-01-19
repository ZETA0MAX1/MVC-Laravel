
<table class="table table-striped">
    <thead>
        <tr>
            <th>DetalleOrdenID</th>
            <th>cantidad</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($detordenes as $detorden)
            <tr>
                <td>{{ $detorden->DetalleOrdenID }}</td>
                <td>{{ $detorden->cantidad }}</td>
                <td>
                    <button class="btn btn-sm btn-primary">Editar</button>
                    <button class="btn btn-sm btn-danger">Eliminar</button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center">No se encontraron resultados</td>
            </tr>
        @endforelse
    </tbody>
</table>
