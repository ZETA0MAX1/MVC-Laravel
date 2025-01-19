<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;

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
}
