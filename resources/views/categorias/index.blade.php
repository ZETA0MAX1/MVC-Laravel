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
@endsection

@section('modales')
    <div class="modal fade" id="modal-agregar" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-agregar-contenido">
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-editar" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-editar-contenido">
            </div>
        </div>
    </div>
@endsection

@section('javascript')
<script>
    $(document).ready(function() {
        document.getElementById("formulario-busqueda").addEventListener("submit", function(evento) {
            evento.preventDefault();
            search();
        });
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

    function modalCrear() {
        const ruta=route("categorias.create");

        axios.get(ruta)
            .then(function(respuesta){
                $('#modal-agregar-contenido').html(respuesta.data);
                $('#modal-agregar').modal('show');
            })
            .catch(function(){

            })
    }

    function guardar() {
    const ruta = route('categorias.store');
    const form = document.getElementById('formulario-crear');
    const data = new FormData(form);

    axios.post(ruta, data)
        .then(function(respuesta) {
            const mensaje = respuesta.data.message;
            toastr.success(mensaje);
            $('#modal-agregar').modal('hide');
            search();
        })
        .catch(function(error) {
            if(error.response){
                toastr.error(error.response.data.message, "Error del sistema");
                if(error.response.status == 422){
                    mostrarErrores('formulario-crear', error.response.data.errors);
                        }
                    } else {
                        toastr.error(error);
                    }
                    // TIPO 2: cuando se comete un error dentro del METODO THEN
                });

    }
</script>
@endsection
