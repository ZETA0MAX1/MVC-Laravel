<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

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
}
