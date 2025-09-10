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
        Schema::table('agentes', function (Blueprint $table) {
            $table->decimal('rating', 3, 2)->default(0); // Ej: 4.25
        $table->unsignedInteger('rating_count')->default(0); // Para calcular promedio
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('agentes', function (Blueprint $table) {
            //
        });
    }
};
