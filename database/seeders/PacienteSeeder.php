<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Paciente;

class PacienteSeeder extends Seeder
{
    public function run(): void
    {
        $pacientes = [
            // Paciente específico
            [
                'CI_Paciente' => '9919520',
                'Nombres' => 'Adriana Marcia',
                'Apellido_P' => 'Mendoza',
                'Apellido_M' => 'Renjifo',
                'Fecha_Nacimiento' => '1998-09-06',
                'Tipo_Sangre' => 'O+',
                'Alergias' => 'Penicilina, Polvo',
                'ID_Hospital' => 1, // Hospital Cotahuma
                'Contrasena' => 'admin123'
            ],
            [
                'CI_Paciente' => '8725120',
                'Nombres' => 'César Luis',
                'Apellido_P' => 'Dockweiler',
                'Apellido_M' => 'Suárez',
                'Fecha_Nacimiento' => '1968-09-06',
                'Tipo_Sangre' => 'O+',
                'Alergias' => 'Penicilina, Polvo, maní',
                'ID_Hospital' => 1, // Hospital Cotahuma
                'Contrasena' => 'Dockweiler8725'
            ],
            [
                'CI_Paciente' => '2376540',
                'Nombres' => 'Marlene Monica',
                'Apellido_P' => 'Suntura',
                'Apellido_M' => 'Chura',
                'Fecha_Nacimiento' => '1989-09-06',
                'Tipo_Sangre' => 'O+',
                'Alergias' => 'Penicilina, Polvo, maní, mariscos',
                'ID_Hospital' => 1, // Hospital Cotahuma
                'Contrasena' => 'Marlene2376'
            ],
            // Otros 15 pacientes
            [
                'CI_Paciente' => '12345678',
                'Nombres' => 'Juan Carlos',
                'Apellido_P' => 'Gonzales',
                'Apellido_M' => 'Perez',
                'Fecha_Nacimiento' => '1985-03-15',
                'Tipo_Sangre' => 'A+',
                'Alergias' => 'Ninguna',
                'ID_Hospital' => 1,
                'Contrasena' => ('paciente123')
            ],
            [
                'CI_Paciente' => '23456789',
                'Nombres' => 'Maria Elena',
                'Apellido_P' => 'Rodriguez',
                'Apellido_M' => 'Lopez',
                'Fecha_Nacimiento' => '1990-07-22',
                'Tipo_Sangre' => 'B+',
                'Alergias' => 'Mariscos, Acetaminofen',
                'ID_Hospital' => 1,
                'Contrasena' => ('paciente123')
            ],
            [
                'CI_Paciente' => '34567890',
                'Nombres' => 'Carlos Andres',
                'Apellido_P' => 'Martinez',
                'Apellido_M' => 'Silva',
                'Fecha_Nacimiento' => '1978-11-30',
                'Tipo_Sangre' => 'AB+',
                'Alergias' => 'Polen, Ácaros',
                'ID_Hospital' => 2, // Policonsultorio 20 de Octubre
                'Contrasena' => ('paciente123')
            ],
            [
                'CI_Paciente' => '45678901',
                'Nombres' => 'Ana Patricia',
                'Apellido_P' => 'Gutierrez',
                'Apellido_M' => 'Castro',
                'Fecha_Nacimiento' => '1995-04-18',
                'Tipo_Sangre' => 'O-',
                'Alergias' => 'Ninguna',
                'ID_Hospital' => 2,
                'Contrasena' => ('paciente123')
            ],
            [
                'CI_Paciente' => '56789012',
                'Nombres' => 'Roberto Jose',
                'Apellido_P' => 'Fernandez',
                'Apellido_M' => 'Vargas',
                'Fecha_Nacimiento' => '1982-12-05',
                'Tipo_Sangre' => 'A-',
                'Alergias' => 'Latex, Yodo',
                'ID_Hospital' => 3, // Hospital Petrolero Obrajes
                'Contrasena' => ('paciente123')
            ],
            [
                'CI_Paciente' => '67890123',
                'Nombres' => 'Laura Sofia',
                'Apellido_P' => 'Paredes',
                'Apellido_M' => 'Rios',
                'Fecha_Nacimiento' => '1993-08-14',
                'Tipo_Sangre' => 'B-',
                'Alergias' => 'Aspirina',
                'ID_Hospital' => 3,
                'Contrasena' => ('paciente123')
            ],
            [
                'CI_Paciente' => '78901234',
                'Nombres' => 'Diego Armando',
                'Apellido_P' => 'Castillo',
                'Apellido_M' => 'Mendez',
                'Fecha_Nacimiento' => '1988-06-25',
                'Tipo_Sangre' => 'O+',
                'Alergias' => 'Polvo, Moho',
                'ID_Hospital' => 4, // Hospital del Tórax
                'Contrasena' => ('paciente123')
            ],
            [
                'CI_Paciente' => '89012345',
                'Nombres' => 'Sandra Lucia',
                'Apellido_P' => 'Morales',
                'Apellido_M' => 'Suarez',
                'Fecha_Nacimiento' => '1975-01-10',
                'Tipo_Sangre' => 'A+',
                'Alergias' => 'Nueces, Chocolate',
                'ID_Hospital' => 4,
                'Contrasena' => ('paciente123')
            ],
            [
                'CI_Paciente' => '90123456',
                'Nombres' => 'Jorge Luis',
                'Apellido_P' => 'Navarro',
                'Apellido_M' => 'Flores',
                'Fecha_Nacimiento' => '1991-02-28',
                'Tipo_Sangre' => 'B+',
                'Alergias' => 'Ninguna',
                'ID_Hospital' => 1,
                'Contrasena' => ('paciente123')
            ],
            [
                'CI_Paciente' => '11223344',
                'Nombres' => 'Patricia Andrea',
                'Apellido_P' => 'Salazar',
                'Apellido_M' => 'Ortega',
                'Fecha_Nacimiento' => '1987-10-12',
                'Tipo_Sangre' => 'AB-',
                'Alergias' => 'Penicilina',
                'ID_Hospital' => 1,
                'Contrasena' => ('paciente123')
            ],
            [
                'CI_Paciente' => '22334455',
                'Nombres' => 'Fernando Jose',
                'Apellido_P' => 'Campos',
                'Apellido_M' => 'Rojas',
                'Fecha_Nacimiento' => '1996-05-20',
                'Tipo_Sangre' => 'O+',
                'Alergias' => 'Mariscos',
                'ID_Hospital' => 2,
                'Contrasena' => ('paciente123')
            ],
            [
                'CI_Paciente' => '33445566',
                'Nombres' => 'Gabriela Maria',
                'Apellido_P' => 'Aguilar',
                'Apellido_M' => 'Cordova',
                'Fecha_Nacimiento' => '1980-09-08',
                'Tipo_Sangre' => 'A+',
                'Alergias' => 'Polen, Ácaros',
                'ID_Hospital' => 2,
                'Contrasena' => ('paciente123')
            ],
            [
                'CI_Paciente' => '44556677',
                'Nombres' => 'Ricardo Antonio',
                'Apellido_P' => 'Guzman',
                'Apellido_M' => 'Pena',
                'Fecha_Nacimiento' => '1972-03-17',
                'Tipo_Sangre' => 'B+',
                'Alergias' => 'Ninguna',
                'ID_Hospital' => 3,
                'Contrasena' => ('paciente123')
            ],
            [
                'CI_Paciente' => '55667788',
                'Nombres' => 'Monica Elizabeth',
                'Apellido_P' => 'Rios',
                'Apellido_M' => 'Miranda',
                'Fecha_Nacimiento' => '1994-11-03',
                'Tipo_Sangre' => 'O-',
                'Alergias' => 'Latex',
                'ID_Hospital' => 3,
                'Contrasena' => ('paciente123')
            ],
            [
                'CI_Paciente' => '66778899',
                'Nombres' => 'Oscar Daniel',
                'Apellido_P' => 'Reyes',
                'Apellido_M' => 'Villarroel',
                'Fecha_Nacimiento' => '1983-07-19',
                'Tipo_Sangre' => 'A+',
                'Alergias' => 'Aspirina, Ibuprofeno',
                'ID_Hospital' => 4,
                'Contrasena' => ('paciente123')
            ]
        ];

        foreach ($pacientes as $paciente) {
            Paciente::create($paciente);
        }
    }
}