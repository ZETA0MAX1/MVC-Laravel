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
        Schema::create('detalle_orden', function (Blueprint $table) {
            $table->id('DetalleOrdenID');
            $table->string('cantidad');
            $table->unsignedBigInteger('OrdenID');
            $table->unsignedBigInteger('ProductoID');
            $table->timestamps();

            $table->foreign('OrdenID')
                  ->references('OrdenID')
                  ->on('ordenes')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('ProductoID')
                   ->references('ProductoID')
                   ->on('producto')
                   ->onDelete('cascade')
                   ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_orden');
    }
};
