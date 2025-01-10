<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetalleOrdenController extends Controller
{
    public function index()
    {
        return view('detorden.index');
    }
}
