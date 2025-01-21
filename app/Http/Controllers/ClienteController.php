<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }
    public function search(Request $request)
    {
        $busqueda =$request->get('busqueda','');
        $query =Cliente::query();

        if(!empty($busqueda)){
            $query->whereYear('created_at',"=",$busqueda);
        }
        $clientes  = $query->get();

        return view('clientes.tabla',compact('clientes'));
    }
    public function create()
    {
        return view('clientes.create');
    }
    public function store(Request $request)
    {
        try{
            $request->validate([
                'cLienteNombre'=>'string|max:255',
                'ciudad'=>'string|max:255',
                'pais'=>'string|max:255'
            ]);
            $cliente=new CLiente();
            $cliente->cLienteNombre =$request->cLienteNombre;
            $cliente->ciudad =$request->ciudad;
            $cliente->pais =$request->pais;
            $cliente->save();

            $data=[
                'message'=>'Registrado correctamente'
            ];

            return response()->json($data,201);

        }catch(\Throwable $error){
            Log::error($error->getMessage());
            $data = [
                'message' => 'Error al registrar al cliente'
            ];
            return response()->json($data,500);
        }
    }
}
