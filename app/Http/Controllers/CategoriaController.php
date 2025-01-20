<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    public function search(Request $request)
    {
            $busqueda = $request->get('busqueda', '');

            $query = Categoria::query();

            if (!empty($busqueda)) {
                $query->where('CategoriaNombre', 'LIKE', "%{$busqueda}%");
            }

            $categorias = $query->get();

            return view('categorias.tabla', compact('categorias'));

    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'CategoriaNombre' => 'required|string|max:255',
                'Description' => 'required|string'
            ]);

            $categoria = new Categoria();

            $categoria->CategoriaNombre = $request->CategoriaNombre;
            $categoria->Description = $request->Description;

            $categoria->save();

            $data = [
                'message' => 'Registrado correctamente'
            ];

            return response()->json($data, 201);

        } catch (\Throwable $error) {
            Log::error($error->getMessage());
            $data = [
                'message' => 'Error al registrar el tipo de curso. Contactarse con el area de soporte'
            ];
            return response()->json($data, 500);
        }

    }
    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);

        $validated = $request->validate([
            'CategoriaNombre' => 'required|string|max:255',
            'Description' => 'nullable|string'
        ]);

        $categoria->update($validated);
        return redirect()->route('categorias.index')->with('success', 'Categoría actualizada exitosamente');
    }

    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada exitosamente');
    }
}
