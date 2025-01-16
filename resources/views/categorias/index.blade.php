@extends('layouts.app')

@section('title', 'Categorías')

@section('content')
    <h1>Lista de Categorias</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Fecha de Creación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->CategoriaID  }}</td>
                    <td>{{ $categoria->CategoriaNombre  }}</td>
                    <td>{{ $categoria->Description  }}</td>
                    <td>{{ $categoria->created_at }}</td>
                    <td>
                        <a href="{{ route('categorias.edit', $categoria->CategoriaID) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('categorias.destroy', $categoria->CategoriaID) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection


@section('javascript')

@endsection
