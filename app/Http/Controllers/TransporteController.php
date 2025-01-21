<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transporte;
use Illuminate\Support\Facades\Log;

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
    public function create()
    {
        return view('transporte.create');
    }
    public function store(Request $request)
    {
        try{
            $request->validate([
                'NombreTransportista'=>'string|max:255',
                'Ciudad'=>'string|max:255',
                'Celular'=>'string|max:255'
            ]);
            $transporte=new Transporte();
            $transporte->NombreTransportista =$request->NombreTransportista;
            $transporte->Ciudad =$request->Ciudad;
            $transporte->Celular =$request->Celular;
            $transporte->save();

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
