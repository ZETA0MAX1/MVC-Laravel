<table class="table">
    <thead>
        <tr>
            <th>ClienteID</th>
            <th>cLienteNombre</th>
            <th>ciudad</th>
            <th>pais</th>
            <th>created_at</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($clientes as $cliente)
            <tr>
                <td>{{$cliente->ClienteID}}</td>
                <td>{{$cliente->cLienteNombre}}</td>
                <td>{{$cliente->ciudad}}</td>
                <td>{{$cliente->pais}}</td>
                <td>{{$cliente->created_at}}</td>
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

