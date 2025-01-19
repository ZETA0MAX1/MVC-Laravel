
<table class="table table-striped">
    <thead>
        <tr>
            <th>ProveedorID</th>
            <th>Direccion</th>
            <th>Ciudad</th>
            <th>Pais</th>
            <th>Celular</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($proveedores as $proveedor)
            <tr>
                <td>{{ $proveedor->ProveedorID }}</td>
                <td>{{ $proveedor->Direccion }}</td>
                <td>{{ $proveedor->Ciudad }}</td>
                <td>{{ $proveedor->Pais }}</td>
                <td>{{ $proveedor->Celular }}</td>
                <td>
                    <button class="btn btn-sm btn-primary">Editar</button>
                    <button class="btn btn-sm btn-danger">Eliminar</button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">No se encontraron resultados</td>
            </tr>
        @endforelse
    </tbody>
</table>
