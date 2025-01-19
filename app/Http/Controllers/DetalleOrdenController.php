<?php

namespace App\Http\Controllers;

use App\Models\DetalleOrden;
use Illuminate\Http\Request;

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
}
