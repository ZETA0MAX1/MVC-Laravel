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
        Schema::create('transportista', function (Blueprint $table) {
            $table->id('transportistaID');
            $table->string('Direccion');
            $table->string('Ciudad');
            $table->string('ContactoNombre');
            $table->string('Pais');
            $table->string('Celular');
            $table->string('CodigoPostal');
            $table->string('NombreTransportista');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transportista');
    }
};
