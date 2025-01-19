<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados=Empleado::all();
        return view('empleados.index',compact('empleados'));
    }

    public function search(Request $request)
    {
        $busqueda =$request->get('busqueda','');
        $query=Empleado::query();

        if(!empty($busqueda)){
            $query->where('Empleadonombre','LIKE',"%{$busqueda}%");
        }
        $empleados = $query->get();

        return view('empleados.tabla',compact('empleados'));
    }
}
