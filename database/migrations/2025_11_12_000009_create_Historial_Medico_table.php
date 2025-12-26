<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('Historial_Medico', function (Blueprint $table) {
            $table->id('ID_Historial');
            $table->string('CI_Paciente', 20);
            $table->date('Fecha_Creacion');
            $table->string('Documento', 255)->nullable();
            $table->timestamps();

            $table->foreign('CI_Paciente')->references('CI_Paciente')->on('Paciente');
        });
    }

    public function down(): void {
        Schema::dropIfExists('Historial_Medico');
    }
};
