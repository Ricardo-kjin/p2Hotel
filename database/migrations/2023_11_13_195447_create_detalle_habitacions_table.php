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
        Schema::create('detalle_habitacions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha_ini')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->decimal('precio', 18, 2)->nullable();
            $table->integer('cantidad')->nullable();
            $table->decimal('subtotal', 18, 2)->nullable();
            $table->bigInteger('reserva_id');
            $table->bigInteger('producto_id');
            $table->timestamps();

            $table->foreign('reserva_id')->references('id')->on('reservas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_habitacions');
    }
};
