<?php

namespace App\Http\Controllers;

use App\Models\DetalleOrden;
use Illuminate\Http\Request;
use App\Models\Orden;
use App\Models\Producto;
use Illuminate\Support\Facades\Log;

class DetalleOrdenController extends Controller
{
    public function index()
    {
        $detordenes = DetalleOrden::all();
        return view('detorden.index', compact('detordenes'));
    }

    public function search(Request $request)
    {
        $busqueda = $request->get('busqueda', '');
        $query = DetalleOrden::query();

        if (!empty($busqueda)) {
            $query->where('cantidad', '<', $busqueda);
            // O si quieres buscar por otros campos, puedes usar:
            // $query->where('campo', 'LIKE', "%{$busqueda}%");
        }

        $detordenes = $query->get(); // Cambiado de $productos a $detordenes
        return view('detorden.tabla', compact('detordenes'));
    }
    public function create()
{
    $ordenes = Orden::select('OrdenID')->get();
    $productos = Producto::select('ProductoID', 'nombreProducto')->get();

    return view('detorden.create', compact('ordenes', 'productos'));
}
    public function store(Request $request)
    {
        try{
            $validated = $request ->validate([
                'OrdenID' => 'required|exists:ordenes,OrdenID',
                'ProductoID' => 'required|exists:producto,ProductoID',
                'cantidad' => 'required|integer|min:1'
            ]);
            $detorden =DetalleOrden::create($validated);

            return response()->json([
                'message' => 'Orden registrada correctamente'
            ], 201);
        } catch (\Throwable $error) {
            Log::error($error->getMessage());
            return response()->json([
                'message' => 'Error al registrar la orden'
            ], 500);
        }
    }

}

