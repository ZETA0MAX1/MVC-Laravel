<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use Illuminate\Http\Request;

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
}
