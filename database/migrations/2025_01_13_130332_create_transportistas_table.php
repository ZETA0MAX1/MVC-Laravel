<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('proveedor', function (Blueprint $table) {
            $table->id('ProveedorID');
            $table->string('Direccion');
            $table->string('Ciudad');
            $table->string('ContactoNombre');
            $table->string('Pais');
            $table->string('Celular');
            $table->string('CodigoPostal');
            $table->string('ProveedorNombre');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedor');
    }
};
