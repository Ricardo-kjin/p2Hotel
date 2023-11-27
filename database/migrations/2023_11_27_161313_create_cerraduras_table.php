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
        Schema::create('cerraduras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cantidad_veces_abierto');
            $table->integer('cantidad_veces_cerrado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cerraduras');
    }
};
