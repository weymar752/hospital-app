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
                'Nombre_Hospital' => 'Hospital Municipal Cotahuma',
                'Nivel_Hospital' => 'Nivel II',
                'Direccion_Hospital' => 'Av. Víctor Agustín Ugarte esquina Jaime Zudañez, La Paz, Bolivia'
            ],
            [
                'Nombre_Hospital' => 'Hospital Municipal La Portada',
                'Nivel_Hospital' => 'Nivel II',
                'Direccion_Hospital' => 'Av. La Florida, Zona La Portada, La Paz, Bolivia'
            ],
            [
                'Nombre_Hospital' => 'Hospital Municipal La Merced',
                'Nivel_Hospital' => 'Nivel II',
                'Direccion_Hospital' => 'Zona La Merced, Calle Villa Aspiazu, La Paz, Bolivia'
            ],
            [
                'Nombre_Hospital' => 'Hospital Municipal Los Pinos',
                'Nivel_Hospital' => 'Nivel II',
                'Direccion_Hospital' => 'Zona Los Pinos, Calle 25 s/n (entre Muñoz Reyes y José Aguirre Acha), La Paz, Bolivia'
            ],
            [
                'Nombre_Hospital' => 'Hospital Municipal La Paz',
                'Nivel_Hospital' => 'Nivel II',
                'Direccion_Hospital' => 'Zona 14 de Septiembre, Calle Nataniel Aguirre, frente a Plaza Garita de Lima, La Paz, Bolivia'
            ]
        ];

        foreach ($hospitales as $hospital) {
            Hospital::create($hospital);
        }
    }
}
