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
        Schema::create('producto', function (Blueprint $table) {
            $table->id('ProductoID');
            $table->string('nombreProducto');
            $table->integer('Cantidad');
            $table->float('Precio');
            $table->unsignedBigInteger('CategoriaID');
            $table->unsignedBigInteger('ProveedorID');
            $table->timestamps();

            $table->foreign('CategoriaID')
                  ->references('CategoriaID')
                  ->on('categoria')
                  ->onDelete('cascade')
                  ->onUpdate('cascade'); // Agregado onUpdate

            $table->foreign('ProveedorID')
                  ->references('ProveedorID')
                  ->on('proveedor')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto');
    }
};
