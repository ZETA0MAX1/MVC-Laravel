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
        Schema::create('ordenes', function (Blueprint $table) {
            $table->id('OrdenID');
            $table->unsignedBigInteger('ClienteID');
            $table->unsignedBigInteger('EmpleadoID');
            $table->unsignedBigInteger('TransportistaID');
            $table->date('fecha_orden');
            $table->timestamps();

            // Definir las relaciones
            $table->foreign('ClienteID')
                  ->references('ClienteID')
                  ->on('cliente')
                  ->onDelete('cascade')
                  ->onUpdate('cascade'); // Agregado onUpdate

            $table->foreign('EmpleadoID')
                  ->references('EmpleadoID')
                  ->on('empleado')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('TransportistaID')
                  ->references('TransportistaID')
                  ->on('transportista')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orden');
    }
};
