<table class="table">
    <thead>
        <tr>
            <th>transportistaID</th>
            <th>NombreTransportista</th>
            <th>Ciudad</th>
            <th>Celular</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($transportistas as $transportista)
            <tr>
                <td>{{$transportista->transportistaID}}</td>
                <td>{{$transportista->NombreTransportista}}</td>
                <td>{{$transportista->Ciudad}}</td>
                <td>{{$transportista->Celular}}</td>
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
