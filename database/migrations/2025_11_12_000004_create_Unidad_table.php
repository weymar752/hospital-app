<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('Unidad', function (Blueprint $table) {
            $table->id('ID_Unidad');
            $table->string('Nombre_Unidad', 100);
            $table->text('Descripcion_Unidad')->nullable();
            $table->unsignedBigInteger('ID_Departamento');
            $table->unsignedBigInteger('ID_Hospital');
            $table->unsignedBigInteger('No_Sala');
            $table->timestamps();

            $table->foreign('ID_Departamento')->references('ID_Departamento')->on('Departamento');
            $table->foreign('ID_Hospital')->references('ID_Hospital')->on('Hospital');
            $table->foreign('No_Sala')->references('No_Sala')->on('Salas');
        });
    }

    public function down(): void {
        Schema::dropIfExists('Unidad');
    }
};
