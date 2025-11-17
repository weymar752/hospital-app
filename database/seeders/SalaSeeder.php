<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Salas;

class SalaSeeder extends Seeder
{
    public function run(): void
    {
        $salas = [
            // Hospital Obrero N.º 1 (Salas reales aproximadas)
            ['No_Sala' => '101', 'Camillas' => 4, 'Bloque' => 'A', 'Piso' => 1, 'Estado' => 'Activa'],
            ['No_Sala' => '102', 'Camillas' => 6, 'Bloque' => 'A', 'Piso' => 1, 'Estado' => 'Activa'],
            ['No_Sala' => '201', 'Camillas' => 8, 'Bloque' => 'B', 'Piso' => 2, 'Estado' => 'Activa'],
            ['No_Sala' => '202', 'Camillas' => 10, 'Bloque' => 'B', 'Piso' => 2, 'Estado' => 'Activa'],
            ['No_Sala' => '301', 'Camillas' => 12, 'Bloque' => 'C', 'Piso' => 3, 'Estado' => 'Activa'],
            ['No_Sala' => '401', 'Camillas' => 6, 'Bloque' => 'D', 'Piso' => 4, 'Estado' => 'Mantenimiento'],
            ['No_Sala' => '402', 'Camillas' => 4, 'Bloque' => 'D', 'Piso' => 4, 'Estado' => 'Activa'],

            // Hospital Petrolero Obrajes
            ['No_Sala' => '501', 'Camillas' => 5, 'Bloque' => 'A', 'Piso' => 1, 'Estado' => 'Activa'],
            ['No_Sala' => '502', 'Camillas' => 7, 'Bloque' => 'A', 'Piso' => 1, 'Estado' => 'Activa'],
            ['No_Sala' => '601', 'Camillas' => 8, 'Bloque' => 'B', 'Piso' => 2, 'Estado' => 'Activa'],
            
            // Hospital del Tórax
            ['No_Sala' => '701', 'Camillas' => 10, 'Bloque' => 'A', 'Piso' => 1, 'Estado' => 'Activa'],
            ['No_Sala' => '702', 'Camillas' => 8, 'Bloque' => 'A', 'Piso' => 1, 'Estado' => 'Activa'],
            ['No_Sala' => '703', 'Camillas' => 6, 'Bloque' => 'B', 'Piso' => 2, 'Estado' => 'Activa'],
            ['No_Sala' => '704', 'Camillas' => 4, 'Bloque' => 'B', 'Piso' => 2, 'Estado' => 'Activa'],
        ];

        foreach ($salas as $sala) {
            Salas::create($sala);
        }
    }
}