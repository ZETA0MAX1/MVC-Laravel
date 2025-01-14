<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
         Schema::create('cliente', function (Blueprint $table) {
             $table->id('clienteID');
             $table->string('direccion');
             $table->string('ciudad');
             $table->string('contacto_nombre');
             $table->string('pais');
             $table->string('clienteNombre');
             $table->string('postal_code');
             $table->timestamps();
         });
    }

    public function down()
    {
         Schema::dropIfExists('clientes'); // Elimina la tabla si se revierte la migración
    }
};
