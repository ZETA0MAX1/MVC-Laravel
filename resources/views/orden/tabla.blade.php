
<table class="table table-striped">
    <thead>
        <tr>
            <th>OrdenID</th>
            <th>ClienteID</th>
            <th>EmpleadoID</th>
            <th>TransportistaID</th>
            <th>fecha_orden</th>
        </tr>
    </thead>
    <tbody>
        @forelse($ordenes as $orden)
            <tr>
                <td>{{ $orden->OrdenID }}</td>
                <td>{{ $orden->ClienteID }}</td>
                <td>{{ $orden->EmpleadoID }}</td>
                <td>{{ $orden->TransportistaID }}</td>
                <td>{{ $orden->fecha_orden }}</td>
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
