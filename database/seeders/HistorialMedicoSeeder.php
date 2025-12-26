<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Historial_Medico;

class HistorialMedicoSeeder extends Seeder
{
    public function run(): void
    {
        $historiales = [
            // Historial para Adriana Marcia
            [
                'CI_Paciente' => '9919520',
                'Fecha_Creacion' => '2024-01-15',
                'Documento' => '/storage/historiales/adriana_mendoza_historial.pdf'
            ],
            // Historiales para los otros pacientes
            [
                'CI_Paciente' => '12345678',
                'Fecha_Creacion' => '2024-01-10',
                'Documento' => '/storage/historiales/juan_gonzales_historial.pdf'
            ],
            [
                'CI_Paciente' => '23456789',
                'Fecha_Creacion' => '2024-01-12',
                'Documento' => '/storage/historiales/maria_rodriguez_historial.pdf'
            ],
            [
                'CI_Paciente' => '34567890',
                'Fecha_Creacion' => '2024-01-08',
                'Documento' => '/storage/historiales/carlos_martinez_historial.pdf'
            ],
            [
                'CI_Paciente' => '45678901',
                'Fecha_Creacion' => '2024-01-14',
                'Documento' => '/storage/historiales/ana_gutierrez_historial.pdf'
            ],
            [
                'CI_Paciente' => '56789012',
                'Fecha_Creacion' => '2024-01-11',
                'Documento' => '/storage/historiales/roberto_fernandez_historial.pdf'
            ],
            [
                'CI_Paciente' => '67890123',
                'Fecha_Creacion' => '2024-01-13',
                'Documento' => '/storage/historiales/laura_paredes_historial.pdf'
            ],
            [
                'CI_Paciente' => '78901234',
                'Fecha_Creacion' => '2024-01-09',
                'Documento' => '/storage/historiales/diego_castillo_historial.pdf'
            ],
            [
                'CI_Paciente' => '89012345',
                'Fecha_Creacion' => '2024-01-16',
                'Documento' => '/storage/historiales/sandra_morales_historial.pdf'
            ],
            [
                'CI_Paciente' => '90123456',
                'Fecha_Creacion' => '2024-01-07',
                'Documento' => '/storage/historiales/jorge_navarro_historial.pdf'
            ],
            [
                'CI_Paciente' => '11223344',
                'Fecha_Creacion' => '2024-01-17',
                'Documento' => '/storage/historiales/patricia_salazar_historial.pdf'
            ],
            [
                'CI_Paciente' => '22334455',
                'Fecha_Creacion' => '2024-01-18',
                'Documento' => '/storage/historiales/fernando_campos_historial.pdf'
            ],
            [
                'CI_Paciente' => '33445566',
                'Fecha_Creacion' => '2024-01-19',
                'Documento' => '/storage/historiales/gabriela_aguilar_historial.pdf'
            ],
            [
                'CI_Paciente' => '44556677',
                'Fecha_Creacion' => '2024-01-20',
                'Documento' => '/storage/historiales/ricardo_guzman_historial.pdf'
            ],
            [
                'CI_Paciente' => '55667788',
                'Fecha_Creacion' => '2024-01-21',
                'Documento' => '/storage/historiales/monica_rios_historial.pdf'
            ],
            [
                'CI_Paciente' => '66778899',
                'Fecha_Creacion' => '2024-01-22',
                'Documento' => '/storage/historiales/oscar_reyes_historial.pdf'
            ]
        ];

        foreach ($historiales as $historial) {
            Historial_Medico::create($historial);
        }
    }
}