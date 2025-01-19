
<table class="table table-striped">
    <thead>
        <tr>
            <th>ProductoID</th>
            <th>nombreProducto</th>
            <th>Cantidad</th>
            <th>Precio</th>
        </tr>
    </thead>
    <tbody>
        @forelse($productos as $producto)
            <tr>
                <td>{{ $producto->ProductoID }}</td>
                <td>{{ $producto->nombreProducto }}</td>
                <td>{{ $producto->Cantidad }}</td>
                <td>{{ $producto->Precio }}</td>
                <td>
                    <button class="btn btn-sm btn-primary">Editar</button>
                    <button class="btn btn-sm btn-danger">Eliminar</button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">No se encontraron resultados</td>
            </tr>
        @endforelse
    </tbody>
</table>
