<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transporte;

class TransporteController extends Controller
{
    public function index()
    {
        $transportistas = Transporte::all();
        return view('transporte.index', compact('transportistas'));
    }

    public function search(Request $request)
{
    $busqueda = $request->get('busqueda', '');
    $query = Transporte::query();

    if (!empty($busqueda)) {
        $query->where('NombreTransportista', 'LIKE', "%{$busqueda}%");
    }

    $transportistas = $query->get();
    return view('transporte.tabla', compact('transportistas'));

}

}
