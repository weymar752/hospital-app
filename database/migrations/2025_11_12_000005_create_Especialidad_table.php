<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('Especialidad', function (Blueprint $table) {
            $table->id('ID_Especialidad');
            $table->string('Nombre_Especialidad', 100);
            $table->text('Descripcion_Especialidad')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('Especialidad');
    }
};
