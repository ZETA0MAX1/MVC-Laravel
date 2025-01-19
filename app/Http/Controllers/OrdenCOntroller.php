<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orden;

class OrdenCOntroller extends Controller
{
    public function index()
    {
        $ordenes=Orden::all();
        return view('orden.index',compact('ordenes'));
    }
    public function search(Request $request)
    {
        $busqueda=$request->get('busqueda','');
        $query=Orden::query();

        if(!empty($busqueda)){
            $query->whereMonth('fecha_orden','=',$busqueda);
        }
        $ordenes = $query->get();

        return view('orden.tabla',compact('ordenes'));
    }
}
