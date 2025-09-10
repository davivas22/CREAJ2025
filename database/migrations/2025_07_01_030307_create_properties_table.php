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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('titulo');
            $table->text('descripcion');
            $table->decimal('precio', 10, 2);
             // ENUM para tipo y estado
            $table->enum('tipo', ['casa', 'apartamento', 'local', 'terreno', 'oficina']);
            $table->enum('estado', ['nueva', 'usada', 'remodelada']);
            $table->integer('habitaciones')->nullable();
            $table->integer('banos')->nullable();
            $table->integer('parqueos')->nullable();
            $table->integer('area_terreno')->nullable(); // m²
            $table->integer('area_construccion')->nullable(); // m²
            $table->string('ubicacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
