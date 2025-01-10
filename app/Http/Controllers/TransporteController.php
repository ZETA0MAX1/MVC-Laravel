<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransporteController extends Controller
{
    public function index()
    {
        return view('transporte.index');
    }
}
