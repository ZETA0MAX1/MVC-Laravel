<?php
namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
class MainController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias',compact('categorias'));
    }
}
