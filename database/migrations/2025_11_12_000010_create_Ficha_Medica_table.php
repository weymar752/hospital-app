<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('Ficha_Medica', function (Blueprint $table) {
            $table->id('No_Ficha_Medica');
            $table->string('CI_Paciente', 20);
            $table->date('Fecha_Creacion');
            $table->date('Fecha_Cita');
            $table->time('Hora_Cita');
            $table->string('Estado_Cita', 50);
            $table->text('Motivo_Consulta');
            $table->string('Ci_Personal_Medico', 20);
            $table->unsignedBigInteger('ID_Hospital');
            $table->timestamps();

            $table->foreign('CI_Paciente')->references('CI_Paciente')->on('Paciente');
            $table->foreign('Ci_Personal_Medico')->references('Ci_Personal_Medico')->on('Personal_Medico');
            $table->foreign('ID_Hospital')->references('ID_Hospital')->on('Hospital');
        });
    }

    public function down(): void {
        Schema::dropIfExists('Ficha_Medica');
    }
};
