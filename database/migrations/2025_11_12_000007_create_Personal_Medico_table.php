<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('Personal_Medico', function (Blueprint $table) {
            $table->string('Ci_Personal_Medico', 20)->primary();
            $table->string('Nombres_PM', 100);
            $table->string('Apellido_P_PM', 100);
            $table->string('Apellido_M_PM', 100);
            $table->string('Telefono', 20)->nullable();
            $table->string('Email', 100)->unique();
            $table->unsignedBigInteger('ID_Categoria');
            $table->unsignedBigInteger('ID_Hospital');
            $table->unsignedBigInteger('ID_Unidad');
            $table->string('Contrasena');
            $table->timestamps();

            $table->foreign('ID_Categoria')->references('ID_Categoria')->on('Categoria');
            $table->foreign('ID_Hospital')->references('ID_Hospital')->on('Hospital');
            $table->foreign('ID_Unidad')->references('ID_Unidad')->on('Unidad');

        });
    }

    public function down(): void {
        Schema::dropIfExists('Personal_Medico');
    }
};
