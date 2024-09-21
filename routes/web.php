<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
//Conexion con mi controller
use App\Http\Controllers\MainController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//MIS PORPIAS RUTAS

/*Route::get('/categorias', function () {
    return 'Bienvenido a categorias'; // Asegúrate de que tengas el archivo categorias.blade.php
})->name('categorias');*/

Route::get('/categorias',[MainController::class,'index'])->name('categorias');


require __DIR__.'/auth.php';
