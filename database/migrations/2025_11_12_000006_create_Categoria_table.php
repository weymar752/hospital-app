<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('Categoria', function (Blueprint $table) {
            $table->id('ID_Categoria');
            $table->string('Nombre_Categoria', 100);
            $table->text('Descripcion_Categoria')->nullable();
            $table->unsignedBigInteger('ID_Especialidad');
            $table->timestamps();

            $table->foreign('ID_Especialidad')->references('ID_Especialidad')->on('Especialidad');
        });
    }

    public function down(): void {
        Schema::dropIfExists('Categoria');
    }
};
