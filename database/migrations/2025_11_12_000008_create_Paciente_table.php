<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('Paciente', function (Blueprint $table) {
            $table->string('CI_Paciente', 20)->primary();
            $table->string('Nombres', 100);
            $table->string('Apellido_P', 100);
            $table->string('Apellido_M', 100);
            $table->date('Fecha_Nacimiento');
            $table->string('Tipo_Sangre', 10);
            $table->text('Alergias')->nullable();
            $table->unsignedBigInteger('ID_Hospital');
            $table->string('Contrasena');
            $table->timestamps();

            $table->foreign('ID_Hospital')->references('ID_Hospital')->on('Hospital');
        });
    }

    public function down(): void {
        Schema::dropIfExists('Paciente');
    }
};
