<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hospital;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hospitales = [
            [
                'Nombre_Hospital' => 'Hospital Obrero N.º 1',
                'Nivel_Hospital' => 'Nivel III',
                'Direccion_Hospital' => 'Av. Saavedra Nº 2231, Zona Miraflores, La Paz, Bolivia'
            ],
            [
                'Nombre_Hospital' => 'Policonsultorio 20 de Octubre',
                'Nivel_Hospital' => 'Nivel II',
                'Direccion_Hospital' => 'Calle Rosendo Gutiérrez Nº 421, Zona Sopocachi, La Paz, Bolivia'
            ],
            [
                'Nombre_Hospital' => 'Hospital Petrolero Obrajes',
                'Nivel_Hospital' => 'Nivel III',
                'Direccion_Hospital' => 'Calle 7 de Obrajes Nº 1216, Zona Obrajes, La Paz, Bolivia'
            ],
            [
                'Nombre_Hospital' => 'Hospital del Tórax',
                'Nivel_Hospital' => 'Nivel III',
                'Direccion_Hospital' => 'Av. Saavedra Nº 2248, Zona Miraflores, La Paz, Bolivia'
            ]
        ];

        foreach ($hospitales as $hospital) {
            Hospital::create($hospital);
        }
    }
}