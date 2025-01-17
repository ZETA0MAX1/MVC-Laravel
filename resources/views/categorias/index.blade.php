@extends('layouts.app')

@section('title', 'Categorías')

@section('content')
<div class="container">
    <h1 class="mb-4">Lista de Categorías</h1>

    <div class="card">
        <div class="card-body">
            <form class="form-inline" id="formulario-busqueda">
                <div class="input-group w-100">
                    <input type="text"
                           class="form-control"
                           id="busqueda"
                           name="busqueda"
                           placeholder="Buscar por nombre o descripción"
                           value="{{ request('busqueda') }}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i> Buscar
                        </button>
                        <button type="button"
                                class="btn btn-success ml-2"
                                onclick="modalCrear()">
                            <i class="fas fa-plus"></i> Nuevo
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div id="listado" class="mt-3">
        @include('categorias.tabla')
    </div>
</div>

<script>
document.getElementById("formulario-busqueda").addEventListener("submit", function(evento) {
    evento.preventDefault();
    search();
});

function search() {
    const busqueda = document.getElementById('busqueda').value;

    axios.get('{{ route('categorias.search') }}', {
        params: { busqueda }
    })
    .then(response => {
        listado.innerHTML = response.data;
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'No se pudo realizar la búsqueda'
        });
    })
    .finally(() => {
        listado.classList.remove('loading');
    });
}

</script>
@endsection
