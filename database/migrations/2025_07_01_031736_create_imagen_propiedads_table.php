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
        Schema::create('imagen_propiedads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('propiedad_id');
            $table->string('ruta'); // nombre o ruta de la imagen
            $table->timestamps();

            $table->foreign('propiedad_id')->references('id')->on('properties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imagen_propiedads');
    }
};
