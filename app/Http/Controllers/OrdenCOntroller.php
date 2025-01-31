<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orden;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Transporte;
use Illuminate\Support\Facades\Log;

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
    public function create()
{
    $clientes = Cliente::select('ClienteID', 'cLienteNombre')->get();
    $empleados = Empleado::select('EmpleadoID', 'Empleadonombre')->get();
    $transportistas = Transporte::select('TransportistaID', 'NombreTransportista')->get();
    return view('orden.create', compact('clientes', 'empleados', 'transportistas'));
}
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'ClienteID' => 'required|exists:cliente,ClienteID',
                'EmpleadoID' => 'required|exists:empleado,EmpleadoID',
                'TransportistaID' => 'required|exists:transportista,TransportistaID',
                'fecha_orden' => 'required|date'
            ]);

            $orden = Orden::create($validated);

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
