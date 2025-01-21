<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;
use Illuminate\Support\Facades\Log;
class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores = Proveedor::all();
        return view('proveedor.index', compact('proveedores'));
    }
    public function search(Request  $request)
    {
        $busqueda = $request->get('busqueda','');
        $query = Proveedor::query();

        if (!empty($busqueda)) {
        $query->where('Ciudad','LIKE',"%{$busqueda}%");
        }
        $proveedores = $query->get();

        return view('proveedor.tabla',compact('proveedores'));
    }
    public function create()
    {
        return view('proveedor.create');
    }
    public function store(Request $request)
    {
        try{
            $request->validate([
                'Direccion'=>'string|max:255',
                'Ciudad'=>'string|max:255',
                'ContactoNombre' => 'nullable|string|max:255',
                'Pais'=>'string|max:255',
                'Celular'=>'string|max:255',
                'ProveedorNombre' => 'required|string|max:255'
            ]);

            $proveedor = new Proveedor();
            $proveedor->Direccion = $request->Direccion;
            $proveedor->Ciudad = $request->Ciudad;
            $proveedor->Pais = $request->Pais;
            $proveedor->Celular = $request->Celular;
            $proveedor->ContactoNombre = $request->ContactoNombre;
            $proveedor->ProveedorNombre = $request->ProveedorNombre;
            $proveedor->save();

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
}
