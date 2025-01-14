<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;



return new class extends Migration
{
    public function up()
    {
         Schema::create('empleado', function (Blueprint $table) {
             $table->id('EmpleadoID');
             $table->date('fecha_nacimiento');
             $table->string('Empleadonombre');
             $table->string('Empleadoapellido');
             $table->text('notas')->nullable();
            $table->string('foto')->nullable();
             $table->timestamps();
         });
    }

    public function down()
    {
         Schema::dropIfExists('empleados');
    }
};
