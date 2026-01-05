<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('Historial_Medico', function (Blueprint $table) {
            $table->id('ID_Historial');

            // Relaciones
            $table->unsignedBigInteger('No_Ficha_Medica');
            $table->string('CI_Paciente', 20);
            $table->unsignedBigInteger('ID_Hospital');
            $table->unsignedBigInteger('ID_Unidad');
            $table->string('Ci_Personal_Medico', 20);

            // Datos médicos
            $table->date('Fecha_Atencion');
            $table->text('Diagnostico');
            $table->string('Enfermedad_Principal', 255);
            $table->text('Tratamiento');
            $table->text('Observaciones')->nullable();

            $table->timestamps();

            // Claves foráneas
            $table->foreign('No_Ficha_Medica')
                  ->references('No_Ficha_Medica')
                  ->on('Ficha_Medica');

            $table->foreign('CI_Paciente')
                  ->references('CI_Paciente')
                  ->on('Paciente');

            $table->foreign('ID_Hospital')
                  ->references('ID_Hospital')
                  ->on('Hospital');

            $table->foreign('ID_Unidad')
                  ->references('ID_Unidad')
                  ->on('Unidad');

            $table->foreign('Ci_Personal_Medico')
                  ->references('Ci_Personal_Medico')
                  ->on('Personal_Medico');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Historial_Medico');
    }
};
