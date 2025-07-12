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
        $table->foreignId('user_id');
        $table->text('descripcion')->nullable();
        $table->integer('propiedades')->default(0);
        $table->integer('usuarios_contacto')->default(0);
        $table->string('red_social')->nullable();
        $table->string('telefono_adicional')->nullable();
        $table->string('especialidad')->nullable();
        $table->text('razon')->nullable();

        // LOS QUE FALTAN
        $table->integer('experiencia')->nullable(); // o ->default(0) si lo deseas obligatorio
        $table->string('zona')->nullable();
        $table->string('licencia')->nullable();
    });
}

public function down(): void
{
    Schema::table('agentes', function (Blueprint $table) {
        $table->dropColumn([
            'descripcion',
            'propiedades',
            'usuarios_contacto',
            'red_social',
            'telefono_adicional',
            'especialidad',
            'razon',
        ]);
    });
}

};
