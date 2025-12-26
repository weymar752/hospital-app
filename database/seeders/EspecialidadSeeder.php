<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Especialidad;

class EspecialidadSeeder extends Seeder
{
    public function run(): void
    {
        $especialidades = [
            ['Nombre_Especialidad' => 'Medicina General', 'Descripcion_Especialidad' => 'Atención médica primaria'],
            ['Nombre_Especialidad' => 'Cardiología', 'Descripcion_Especialidad' => 'Especialidad en enfermedades del corazón'],
            ['Nombre_Especialidad' => 'Pediatría', 'Descripcion_Especialidad' => 'Medicina infantil'],
            ['Nombre_Especialidad' => 'Neurología', 'Descripcion_Especialidad' => 'Especialidad en sistema nervioso'],
            ['Nombre_Especialidad' => 'Neumología', 'Descripcion_Especialidad' => 'Especialidad en enfermedades respiratorias'],
            ['Nombre_Especialidad' => 'Cirugía General', 'Descripcion_Especialidad' => 'Procedimientos quirúrgicos'],
        ];

        foreach ($especialidades as $especialidad) {
            Especialidad::create($especialidad);
        }
    }
}