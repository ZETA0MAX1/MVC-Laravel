@extends('layouts.app')

@section('title', 'Transportista')

@section('content')
<div class="container">
    <h1>TRANSPORTISTAS</h1>
    <div class="card">
        <div class="card-body">
            <form class="form-inline" id="formulario-busqueda">
                <div class="input-group w-100">
                    <input type="text"
                           class="form-control"
                           id="busqueda"
                           name="busqueda"
                           placeholder="Ingrese nombres separados por comas (ejemplo: Juan,María,Pedro)"
                           value="{{ request('busqueda') }}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i> Buscar
                        </button>
                        <button type="button"
                                class="btn btn-success ms-2"
                                onclick="modalCrear()">
                            <i class="fas fa-plus"></i> Nuevo
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="listado" class="mt-3">
        @include('transporte.tabla')
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById("formulario-busqueda").addEventListener("submit", function(evento) {
        evento.preventDefault();
        search();
    });
});

function search() {
    const busqueda = document.getElementById('busqueda').value.trim();

    axios.get('{{ route('transporte.search') }}', {
        params: {
            busqueda: busqueda
        }
    })
    .then(response => {
        document.getElementById('listado').innerHTML = response.data;
    })
    .catch(error => {
        console.error('Error', error);
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'No se pudo realizar la búsqueda'
        });
    });
}
</script>
@endsection


