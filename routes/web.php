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

Route::resource('categorias', CategoriaController::class);

Route::resource('cliente', ClienteController::class);

Route::resource('empleado', EmpleadoController::class);

Route::resource('det_orden', DetalleOrdenController::class);

Route::resource('orden', OrdenCOntroller::class);

Route::resource('producto', ProductoController::class);

Route::resource('transporte', TransporteController::class);

Route::resource('proveedor', ProveedorController::class);
