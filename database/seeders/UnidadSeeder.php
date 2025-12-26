<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Unidad;

class UnidadSeeder extends Seeder
{
    public function run(): void
    {
        $unidades = [
            // ===== HOSPITAL OBRERO N.º 1 =====
            // Departamento Médico
            [
                'Nombre_Unidad' => 'Consulta Externa General',
                'Descripcion_Unidad' => 'Atención médica general y consultas de primera vez',
                'ID_Departamento' => 1, // Médico
                'ID_Hospital' => 1, // Hospital Obrero
                'No_Sala' => '101'
            ],
            [
                'Nombre_Unidad' => 'Medicina Interna',
                'Descripcion_Unidad' => 'Especialidad en enfermedades del adulto',
                'ID_Departamento' => 1,
                'ID_Hospital' => 1,
                'No_Sala' => '102'
            ],
            [
                'Nombre_Unidad' => 'Cardiología',
                'Descripcion_Unidad' => 'Especialidad en enfermedades del corazón',
                'ID_Departamento' => 1,
                'ID_Hospital' => 1,
                'No_Sala' => '201'
            ],
            [
                'Nombre_Unidad' => 'Neurología',
                'Descripcion_Unidad' => 'Especialidad en enfermedades del sistema nervioso',
                'ID_Departamento' => 1,
                'ID_Hospital' => 1,
                'No_Sala' => '202'
            ],

            // Departamento de Emergencias
            [
                'Nombre_Unidad' => 'Emergencias Adultos',
                'Descripcion_Unidad' => 'Atención de emergencias médicas para adultos',
                'ID_Departamento' => 4, // Emergencias
                'ID_Hospital' => 1,
                'No_Sala' => '301'
            ],

            // Departamento de Servicios Generales
            [
                'Nombre_Unidad' => 'Laboratorio Clínico',
                'Descripcion_Unidad' => 'Análisis de muestras biológicas',
                'ID_Departamento' => 2, // Servicios Generales
                'ID_Hospital' => 1,
                'No_Sala' => '401'
            ],
            [
                'Nombre_Unidad' => 'Rayos X',
                'Descripcion_Unidad' => 'Servicio de radiología convencional',
                'ID_Departamento' => 2,
                'ID_Hospital' => 1,
                'No_Sala' => '402'
            ],

            // ===== HOSPITAL PETROLERO OBRAJES =====
            [
                'Nombre_Unidad' => 'Consulta General',
                'Descripcion_Unidad' => 'Atención médica general',
                'ID_Departamento' => 1,
                'ID_Hospital' => 3, // Hospital Petrolero
                'No_Sala' => '501'
            ],
            [
                'Nombre_Unidad' => 'Pediatría',
                'Descripcion_Unidad' => 'Atención médica infantil',
                'ID_Departamento' => 1,
                'ID_Hospital' => 3,
                'No_Sala' => '502'
            ],

            // ===== HOSPITAL DEL TÓRAX =====
            [
                'Nombre_Unidad' => 'Neumología',
                'Descripcion_Unidad' => 'Especialidad en enfermedades respiratorias',
                'ID_Departamento' => 1,
                'ID_Hospital' => 4, // Hospital del Tórax
                'No_Sala' => '701'
            ],
            [
                'Nombre_Unidad' => 'Terapia Intensiva',
                'Descripcion_Unidad' => 'Cuidados intensivos para pacientes críticos',
                'ID_Departamento' => 4,
                'ID_Hospital' => 4,
                'No_Sala' => '702'
            ],

            // Departamento Administrativo (compartido entre hospitales)
            [
                'Nombre_Unidad' => 'Afiliación y Seguros',
                'Descripcion_Unidad' => 'Gestión de afiliaciones y seguros médicos',
                'ID_Departamento' => 3, // Administrativo
                'ID_Hospital' => 1,
                'No_Sala' => '703'
            ],
            [
                'Nombre_Unidad' => 'Archivo Médico',
                'Descripcion_Unidad' => 'Almacenamiento y gestión de historias clínicas',
                'ID_Departamento' => 3,
                'ID_Hospital' => 1,
                'No_Sala' => '704'
            ],
        ];

        foreach ($unidades as $unidad) {
            Unidad::create($unidad);
        }
    }
}