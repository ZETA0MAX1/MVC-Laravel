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
    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'contenido' => 'required',
        ]);

        Categoria::create($request->all());

        return redirect()->route('articulos.index')
                         ->with('success', 'Artículo creado con éxito.');
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
            'titulo' => 'required',
            'contenido' => 'required',
        ]);

        $categoria->update($request->all());

        return redirect()->route('articulos.index')
                         ->with('success', 'Artículo actualizado con éxito.');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return redirect()->route('articulos.index')
                         ->with('success', 'Artículo eliminado con éxito.');
    }
}
