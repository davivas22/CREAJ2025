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
        Schema::table('solicituds', function (Blueprint $table) {
             $table->text('razon')->nullable()->after('zona'); // Campo nuevo después de 'zona'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('solicituds', function (Blueprint $table) {
              $table->dropColumn('razon');
        });
    }
};
