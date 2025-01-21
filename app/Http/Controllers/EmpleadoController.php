<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados=Empleado::all();
        return view('empleado.index',compact('empleados'));
    }

    public function search(Request $request)
    {
        $busqueda =$request->get('busqueda','');
        $query=Empleado::query();

        if(!empty($busqueda)){
            $query->where('Empleadonombre','LIKE',"%{$busqueda}%");
        }
        $empleados = $query->get();

        return view('empleado.tabla',compact('empleados'));
    }
    public function create()
    {
        return view('empleado.create');
    }
    public function store(Request $request)
    {
        try{

            $request->validate([
                'Empleadonombre'=>'string|max:255',
                'fecha_nacimiento'=>'string|max:255',
                'foto'=>'string|max:255'
            ]);
            $empleado=new Empleado();
            $empleado->Empleadonombre =$request->Empleadonombre;
            $empleado->fecha_nacimiento =$request->fecha_nacimiento;
            $empleado->foto =$request->foto;
            $empleado->save();

            $data=[
                'message'=>'Registrado correctamente'
            ];

            return response()->json($data,201);

        }catch(\Throwable $error){
            Log::error($error->getMessage());
            $data = [
                'message' => 'Error al registrar al transportista'
            ];
            return response()->json($data,500);
        }
    }




}
