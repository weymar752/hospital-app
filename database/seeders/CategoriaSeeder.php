<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = [
            ['Nombre_Categoria' => 'Médico General', 'Descripcion_Categoria' => 'Médico de atención primaria', 'ID_Especialidad' => 1],
            ['Nombre_Categoria' => 'Cardiólogo', 'Descripcion_Categoria' => 'Especialista en cardiología', 'ID_Especialidad' => 2],
            ['Nombre_Categoria' => 'Pediatra', 'Descripcion_Categoria' => 'Especialista en pediatría', 'ID_Especialidad' => 3],
            ['Nombre_Categoria' => 'Neurólogo', 'Descripcion_Categoria' => 'Especialista en neurología', 'ID_Especialidad' => 4],
            ['Nombre_Categoria' => 'Neumólogo', 'Descripcion_Categoria' => 'Especialista en neumología', 'ID_Especialidad' => 5],
            ['Nombre_Categoria' => 'Cirujano General', 'Descripcion_Categoria' => 'Especialista en cirugía', 'ID_Especialidad' => 6],
        ];

        foreach ($categorias as $categoria) {
            Categoria::create($categoria);
        }
    }
}