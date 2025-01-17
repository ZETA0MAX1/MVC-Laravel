<?php

namespace App\Http\Controllers;
use App\Models\Categoria;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all(); // Obtiene todas las categorías
        return view('categorias.index', compact('categorias'));
    }
    public function search(Request $request)
    {
        $busqueda = $request->input('busqueda');

        $categorias = Categoria::query();

        if($busqueda) {
            $categorias = $categorias->where('nombre', 'like', "%$busqueda%");
        }

        $categorias = $categorias->get();

        return view('categorias.tabla', compact('categorias'));
    }
    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'CategoriaNombre' => 'required',
            'Description' => 'required',
        ]);

        Categoria::create($request->all());

        return redirect()->route('categorias.index')
                         ->with('success', 'Categoría creado con éxito.');
    }

    public function show(Categoria $articulo)
    {
        return view('articulos.show', compact('articulo'));
    }

    public function edit(Categoria $articulo)
    {
        return view('articulos.edit', compact('articulo'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'CategoriaNombre' => 'required',
            'Description' => 'required',
        ]);

        $categoria->update($request->all());

        return redirect()->route('categorias.index')
                         ->with('success', 'Categoría actualizado con éxito.');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return redirect()->route('articulos.index')
                         ->with('success', 'Artículo eliminado con éxito.');
    }
}
