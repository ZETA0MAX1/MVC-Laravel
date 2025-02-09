<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Proveedor;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class ProductoController extends Controller
{
    public function index()
    {
        $productos=Producto::all();
        return view('producto.index',compact('productos'));
    }
    public function search(Request $request)
    {
        $busqueda=$request->get('busqueda','');
        $query=Producto::query();
        if(!empty($busqueda)){
            $query->where('Cantidad','<',$busqueda);
        }
        $productos=$query->get();
        return view('producto.tabla',compact('productos'));
    }
    public function create(Request $request)
    {
        $categorias = Categoria::select('CategoriaID', 'CategoriaNombre')->get();
        $proveedores = Proveedor::select('ProveedorID', 'ProveedorNombre')->get();
        return view('producto.create', compact('categorias', 'proveedores'));
    }

    public function store(Request $request)
{
    try {
        $validated = $request->validate([
            'nombreProducto' => 'required|string|max:255',
            'Cantidad' => 'required|integer|min:1',
            'Precio' => 'required|numeric|min:0',
            'CategoriaID' => 'required|exists:categoria,CategoriaID',
            'ProveedorID' => 'required|exists:proveedor,ProveedorID',
        ]);


        $producto = Producto::create($validated);

        return response()->json([
            'message' => 'Producto registrado correctamente',
            'producto' => $producto
        ], 201);

    } catch (ValidationException $e) {
        Log::error('Errores de validación: ' . json_encode($e->errors()));
        return response()->json([
            'message' => 'Error de validación',
            'errors' => $e->errors()
        ], 422);

    } catch (\Throwable $error) {
        Log::error($error->getMessage());
        return response()->json([
            'message' => 'Error al registrar el producto',
            'error' => $error->getMessage()
        ], 500);
    }
}
    }

