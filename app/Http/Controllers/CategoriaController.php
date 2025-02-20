<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

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
    public function edit(string $id)
    {
        try {

            $categoria = Categoria::find($id);

            return view(' categorias.edit', ["item" => $categoria]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }


    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(),[
            'CategoriaNombre' => 'required|string|max:255',
            'Description' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $data = [
                'errors' => $errors,
                'message' => 'Error al validar los datos'
            ];

            return response()->json($data, 422);
        }

        try {
            $categoria = Categoria::find($id);
            $categoria->CategoriaNombre = $request->get('CategoriaNombre');
            $categoria->Description = $request->get('Description');
            $categoria->save(); // aplicando el UPDATE tipocurso SET nombre = $reques WHERE id = $id
            $data = ['message' => 'Actualizado correctamente'];
            return response()->json($data, 200);
        } catch (\Throwable $error) {
            Log::error($error->getMessage());
            $data = [
                'message' => 'Error al actualizar el tipo de curso'
            ];
            return response()->json($data, 500);
        }


    }
    public function destroy(string $id)
    {
        try {
            $categoria = Categoria::where('CategoriaID', $id)->first();
            if (!$categoria) {
                return response()->json(['message' => 'Categoría no encontrada'], 404);
            }
            $categoria->delete(); // DELETE FROM categorias WHERE CategoriaID = $id

            return response()->json(['message' => 'Eliminado correctamente'], 200);

        } catch (\Throwable $error) {
            Log::error($error->getMessage());

            $data = ['message' => 'Error al eliminar tipo de curso'];

            return response()->json($data, 500);
        }
    }
}
