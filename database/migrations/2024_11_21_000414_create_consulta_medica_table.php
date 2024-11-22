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
        Schema::create('consulta_medica', function (Blueprint $table) {
            $table->id();
            $table -> string("nombre_paciente",50);
            $table -> string("ubicacion",50);
            $table -> string("telefono",50);
            $table -> string("sintomas_paciente",350);
            $table -> date("fecha_consulta");
            $table -> time("hora_consulta");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consulta_medica');
    }
};
