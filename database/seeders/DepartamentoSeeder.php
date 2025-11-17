<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Departamento;

class DepartamentoSeeder extends Seeder
{
    public function run(): void
    {
        $departamentos = [
            [
                'Nombre_Departamento' => 'Departamento Médico',
                'Descripcion_Departamento' => 'Área dedicada a la atención médica especializada y general de pacientes'
            ],
            [
                'Nombre_Departamento' => 'Departamento de Servicios Generales',
                'Descripcion_Departamento' => 'Unidades de apoyo diagnóstico y servicios complementarios'
            ],
            [
                'Nombre_Departamento' => 'Departamento Administrativo',
                'Descripcion_Departamento' => 'Área de gestión, administración y servicios al paciente'
            ],
            [
                'Nombre_Departamento' => 'Departamento de Emergencias',
                'Descripcion_Departamento' => 'Atención médica urgente y crítica 24/7'
            ],
            [
                'Nombre_Departamento' => 'Departamento Quirúrgico',
                'Descripcion_Departamento' => 'Área destinada a procedimientos quirúrgicos y pre-operatorios'
            ]
        ];

        foreach ($departamentos as $departamento) {
            Departamento::create($departamento);
        }
    }
}