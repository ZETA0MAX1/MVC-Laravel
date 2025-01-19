
<table class="table table-striped">
    <thead>
        <tr>
            <th>EmpleadoID</th>
            <th>Empleadonombre</th>
            <th>fecha_nacimiento</th>
            <th>foto</th>
        </tr>
    </thead>
    <tbody>
        @forelse($empleados as $empleado)
            <tr>
                <td>{{ $empleado->EmpleadoID }}</td>
                <td>{{ $empleado->Empleadonombre }}</td>
                <td>{{ $empleado->fecha_nacimiento }}</td>
                <td>{{ $empleado->foto }}</td>
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
