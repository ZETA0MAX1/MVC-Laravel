<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;



return new class extends Migration
{
    public function up()
    {
         Schema::create('cliente', function (Blueprint $table) {
             $table->id('ClienteID');
             $table->string('cLienteNombre');
             $table->string('codigoPostal');
             $table->string('pais');
             $table->string('ciudad');
             $table->string('nombreContacto');
             $table->string('direccion');
             $table->timestamps();
         });
    }

    public function down()
    {
         Schema::dropIfExists('empleados');
    }
};
