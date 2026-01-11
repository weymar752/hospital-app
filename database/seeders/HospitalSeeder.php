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
                'Nombre_Hospital' => 'Hospital de Clínicas',
                'Nivel_Hospital' => 'Nivel III',
                'Direccion_Hospital' => 'Av. Saavedra N° 2246, Zona Miraflores, La Paz, Bolivia'
            ],
            [
                'Nombre_Hospital' => 'Caja Nacional de Salud - Manco Kapac',
                'Nivel_Hospital' => 'Nivel II',
                'Direccion_Hospital' => 'Av. Manco Kapac, Zona Miraflores, La Paz, Bolivia'
            ],
            [
                'Nombre_Hospital' => 'Posta Médica Villa Copacabana',
                'Nivel_Hospital' => 'Nivel I',
                'Direccion_Hospital' => 'Zona Villa Copacabana, Distrito 3, La Paz, Bolivia'
            ],
            [
                'Nombre_Hospital' => 'Posta Médica Villa San Antonio',
                'Nivel_Hospital' => 'Nivel I',
                'Direccion_Hospital' => 'Zona Villa San Antonio, Distrito 6, La Paz, Bolivia'
            ],
            [
                'Nombre_Hospital' => 'Hospital Universitario Nuestra Señora de La Paz',
                'Nivel_Hospital' => 'Nivel II',
                'Direccion_Hospital' => 'Zona Miraflores, La Paz, Bolivia'
            ]
        ];

        foreach ($hospitales as $hospital) {
            Hospital::create($hospital);
        }
    }
}
