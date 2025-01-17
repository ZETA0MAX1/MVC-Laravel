@extends('layouts.app')

@section('title', 'Categorías')

@section('content')


    <h1>Lista de Categorias</h1>


    <div class="container">
        <h2>Busqueda :</h2>

        <div class="card-body">
            <form class="form-inline" id="formulario-busqueda">
                <label class="my-1 mr-2" for="busqueda">Nombre</label>
                <input type="text" class="form-control my-1 mr-sm-2" id="busqueda" name="busqueda">
                <button type="submit" class="btn btn-primary my-1">Buscar</button>
                <button onclick="modalCrear()" type="button" class="btn btn-success my-1 mx-1">Nuevo</button>
            </form>
        </div>
        <div id="listado" class="mt-3">
            @include('categorias.tabla')
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
        const busqueda = document.getElementById("busqueda").value;
        const ruta = "{{ route('categorias.search') }}";

        axios.get(ruta, {
            params: {
                busqueda: busqueda
            }
        }).then(function(response) {
            document.getElementById("listado").innerHTML = response.data;
        }).catch(function(error) {
            console.error("Error en la búsqueda:", error);
            alert("Error al realizar la búsqueda");
        });
    }
</script>
@endsection
