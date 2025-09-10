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
        Schema::create('agente_user_ratings', function (Blueprint $table) {
            $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('agente_id')->constrained()->onDelete('cascade');
        $table->unsignedTinyInteger('rating'); // 1 a 5
        $table->timestamps();

        $table->unique(['user_id', 'agente_id']); // 👈 un usuario solo puede votar una vez por agente
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agente_user_ratings');
    }
};
