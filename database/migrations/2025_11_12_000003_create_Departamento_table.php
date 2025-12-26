<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('Departamento', function (Blueprint $table) {
            $table->id('ID_Departamento');
            $table->string('Nombre_Departamento', 100);
            $table->text('Descripcion_Departamento')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('Departamento');
    }
};
