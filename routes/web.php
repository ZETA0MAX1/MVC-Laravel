<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DetalleOrdenController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OrdenCOntroller;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\TransporteController;
use DragonCode\Contracts\Cashier\Config\Main;

Route::get('/', [MainController::class, 'index'])->name('dashboard');

Route::resource('categorias', CategoriaController::class)->except(['show']);

Route::get('/categorias/search', [CategoriaController::class, 'search'])->name('categorias.search');

Route::resource('cliente', ClienteController::class);

Route::get('clientes/search',[ClienteController::class,'search'])->name('clientes.search');

Route::get('empleado/search',[EmpleadoController::class,'search'])->name('empleado.search');
Route::resource('empleado', EmpleadoController::class);

Route::resource('det_orden', DetalleOrdenController::class);

Route::resource('orden', OrdenCOntroller::class);

Route::resource('producto', ProductoController::class);

Route::get('transporte/search',[TransporteController::class,'search'])->name('transporte.search');
Route::resource('transporte', TransporteController::class);


Route::resource('proveedor', ProveedorController::class);

Route::get('/proveedores/search',[ProveedorController::class,'search'])->name('proveedores.search');
