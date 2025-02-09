


@extends('layouts.app')

@section('title', 'Producto')

@section('content')
<div class="container">
    <h1>Mis productos</h1>
    <div class="card">
        <div class="card-body">
            <form class="form-inline" id="formulario-busqueda">
                <div class="input-group w-100">
                    <input type="text"
                           class="form-control"
                           id="busqueda"
                           name="busqueda"
                           placeholder="Buscar por nombre de ciudad del proveedor"
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
        @include('producto.tabla')
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
    document.getElementById("formulario-busqueda").addEventListener("submit", function(evento) {
        evento.preventDefault();
        search();
    });

    function search() {
        const busqueda = document.getElementById('busqueda').value.trim();

        axios.get('{{ route('producto.search') }}', {
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
    function modalCrear(){
        console.log('Iniciando modalCrear');
        const ruta = route('producto.create');

        axios.get(ruta)
        .then(function(respuesta) {
            console.log('Respuesta recibida:', respuesta.data);
            $('#modal-agregar-contenido').html(respuesta.data);
            console.log('Contenido insertado');

            const modalElement = document.getElementById('modal-agregar');
            console.log('Elemento modal:', modalElement);

            const modal = new bootstrap.Modal(modalElement);
            modal.show();
            console.log('Modal mostrado');
        })
        .catch(function(error) {
            console.error('Error:', error);
        });
    }
    function guardar(){
        const ruta = route('producto.store');
        const form = document.getElementById('formulario-crear');
        const data = new FormData(form);

        axios.post(ruta,data)
            .then(function(respuesta){
                const mensaje = respuesta.data.message;
                toastr.success(mensaje);
                $('#modal-agregar').modal('hide');
                search();
            })
            .catch(function(error){
                if(error.response){
                    toastr.error(error.response.data.message,"Error del sistema");
                    if(error.response.status == 422){
                        mostrarErrores('formulario-crear',error.response.data.errors);
                    }
                }else{
                    toastr.error(error);
                }
            });
    }

</script>
 @endsection

