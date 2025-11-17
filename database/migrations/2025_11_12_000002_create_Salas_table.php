<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('Salas', function (Blueprint $table) {
            $table->id('No_Sala');
            $table->integer('Camillas');
            $table->string('Bloque', 20);
            $table->integer('Piso');
            $table->string('Estado', 50);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('Salas');
    }
};
