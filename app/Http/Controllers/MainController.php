<?php
namespace App\Http\Controllers;

class MainController extends Controller
{
    public function index()
    {
        $data = [
            'users' => 120,
            'sales' => 3400,
            'products' => 56,
        ];

        return view('dashboard', compact('data'));
    }

}
