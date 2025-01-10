<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrdenCOntroller extends Controller
{
    public function index()
    {
        return view('orden.index');
    }
}
