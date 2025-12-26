<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('Hospital', function (Blueprint $table) {
            $table->id('ID_Hospital');
            $table->string('Nombre_Hospital', 100);
            $table->string('Nivel_Hospital', 50);
            $table->string('Direccion_Hospital', 150);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('Hospital');
    }
};
