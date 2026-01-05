<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Personal_Medico;

class PersonalMedicoSeeder extends Seeder
{
    public function run(): void
    {
        $personalMedico = [
            // Tu perfil
            [
                'Ci_Personal_Medico' => '9919521',
                'Nombres_PM' => 'Weymar Rodrigo',
                'Apellido_P_PM' => 'Mendoza',
                'Apellido_M_PM' => 'Renjifo',
                'Telefono' => '65623943',
                'Email' => 'weymar752@gmail.com',
                'ID_Categoria' => 1, // Médico General
                'ID_Hospital' => 1, // Hospital Obrero N.º 1
                'ID_Unidad' => 1, // Consulta Externa General
                'Contrasena' => ('admin123')
            ],
            [
                'Ci_Personal_Medico' => '8725121',
                'Nombres_PM' => 'César Luis',
                'Apellido_P_PM' => 'Dockweiler',
                'Apellido_M_PM' => 'Suárez',
                'Telefono' => '71234567',
                'Email' => 'cesar.dockweiler@hospital.com',
                'ID_Categoria' => 2, // Cardiólogo
                'ID_Hospital' => 1, // Hospital Obrero N.º 1
                'ID_Unidad' => 3, // Cardiología
                'Contrasena' => ('Dockweiler8725')
            ],
            [
                'Ci_Personal_Medico' => '2376541',
                'Nombres_PM' => 'Marlene Monica',
                'Apellido_P_PM' => 'Suntura',
                'Apellido_M_PM' => 'Chura',
                'Telefono' => '67189800',
                'Email' => 'Marlene@gmail.com',
                'ID_Categoria' => 3, // Pediatra
                'ID_Hospital' => 1, // Hospital Obrero N.º 1
                'ID_Unidad' => 2, // Medicina Interna
                'Contrasena' => ('Marlene2376')
            ],
            // Otros 15 personal médico
            [
                'Ci_Personal_Medico' => '1234567',
                'Nombres_PM' => 'Juan Carlos',
                'Apellido_P_PM' => 'Garcia',
                'Apellido_M_PM' => 'Lopez',
                'Telefono' => '77788899',
                'Email' => 'juan.garcia@hospital.com',
                'ID_Categoria' => 2, // Cardiólogo
                'ID_Hospital' => 1,
                'ID_Unidad' => 3, // Cardiología
                'Contrasena' => ('medico123')
            ],
            [
                'Ci_Personal_Medico' => '2345678',
                'Nombres_PM' => 'Maria Elena',
                'Apellido_P_PM' => 'Fernandez',
                'Apellido_M_PM' => 'Rodriguez',
                'Telefono' => '77712345',
                'Email' => 'maria.fernandez@hospital.com',
                'ID_Categoria' => 3, // Pediatra
                'ID_Hospital' => 1,
                'ID_Unidad' => 2, // Medicina Interna
                'Contrasena' => ('medico123')
            ],
            [
                'Ci_Personal_Medico' => '3456789',
                'Nombres_PM' => 'Carlos Alberto',
                'Apellido_P_PM' => 'Martinez',
                'Apellido_M_PM' => 'Silva',
                'Telefono' => '77723456',
                'Email' => 'carlos.martinez@hospital.com',
                'ID_Categoria' => 4, // Neurólogo
                'ID_Hospital' => 1,
                'ID_Unidad' => 4, // Neurología
                'Contrasena' => ('medico123')
            ],
            [
                'Ci_Personal_Medico' => '4567890',
                'Nombres_PM' => 'Ana Patricia',
                'Apellido_P_PM' => 'Gutierrez',
                'Apellido_M_PM' => 'Castro',
                'Telefono' => '77734567',
                'Email' => 'ana.gutierrez@hospital.com',
                'ID_Categoria' => 1, // Médico General
                'ID_Hospital' => 2, // Policonsultorio 20 de Octubre
                'ID_Unidad' => 8, // Consulta General
                'Contrasena' => ('medico123')
            ],
            [
                'Ci_Personal_Medico' => '5678901',
                'Nombres_PM' => 'Roberto Andres',
                'Apellido_P_PM' => 'Perez',
                'Apellido_M_PM' => 'Mendez',
                'Telefono' => '77745678',
                'Email' => 'roberto.perez@hospital.com',
                'ID_Categoria' => 5, // Neumólogo
                'ID_Hospital' => 4, // Hospital del Tórax
                'ID_Unidad' => 10, // Neumología
                'Contrasena' => ('medico123')
            ],
            [
                'Ci_Personal_Medico' => '6789012',
                'Nombres_PM' => 'Laura Sofia',
                'Apellido_P_PM' => 'Ramirez',
                'Apellido_M_PM' => 'Vargas',
                'Telefono' => '77756789',
                'Email' => 'laura.ramirez@hospital.com',
                'ID_Categoria' => 3, // Pediatra
                'ID_Hospital' => 3, // Hospital Petrolero Obrajes
                'ID_Unidad' => 9, // Pediatría
                'Contrasena' => ('medico123')
            ],
            [
                'Ci_Personal_Medico' => '7890123',
                'Nombres_PM' => 'Diego Armando',
                'Apellido_P_PM' => 'Castillo',
                'Apellido_M_PM' => 'Rojas',
                'Telefono' => '77767890',
                'Email' => 'diego.castillo@hospital.com',
                'ID_Categoria' => 6, // Cirujano General
                'ID_Hospital' => 1,
                'ID_Unidad' => 5, // Emergencias Adultos
                'Contrasena' => ('medico123')
            ],
            [
                'Ci_Personal_Medico' => '8901234',
                'Nombres_PM' => 'Sandra Lucia',
                'Apellido_P_PM' => 'Morales',
                'Apellido_M_PM' => 'Paredes',
                'Telefono' => '77778901',
                'Email' => 'sandra.morales@hospital.com',
                'ID_Categoria' => 1, // Médico General
                'ID_Hospital' => 1,
                'ID_Unidad' => 1, // Consulta Externa General
                'Contrasena' => ('medico123')
            ],
            [
                'Ci_Personal_Medico' => '9012345',
                'Nombres_PM' => 'Jorge Luis',
                'Apellido_P_PM' => 'Suarez',
                'Apellido_M_PM' => 'Flores',
                'Telefono' => '77789012',
                'Email' => 'jorge.suarez@hospital.com',
                'ID_Categoria' => 2, // Cardiólogo
                'ID_Hospital' => 1,
                'ID_Unidad' => 3, // Cardiología
                'Contrasena' => ('medico123')
            ],
            [
                'Ci_Personal_Medico' => '1122334',
                'Nombres_PM' => 'Patricia Andrea',
                'Apellido_P_PM' => 'Navarro',
                'Apellido_M_PM' => 'Salazar',
                'Telefono' => '77790123',
                'Email' => 'patricia.navarro@hospital.com',
                'ID_Categoria' => 4, // Neurólogo
                'ID_Hospital' => 1,
                'ID_Unidad' => 4, // Neurología
                'Contrasena' => ('medico123')
            ],
            [
                'Ci_Personal_Medico' => '2233445',
                'Nombres_PM' => 'Fernando Jose',
                'Apellido_P_PM' => 'Ortega',
                'Apellido_M_PM' => 'Campos',
                'Telefono' => '77701234',
                'Email' => 'fernando.ortega@hospital.com',
                'ID_Categoria' => 1, // Médico General
                'ID_Hospital' => 2,
                'ID_Unidad' => 8, // Consulta General
                'Contrasena' => ('medico123')
            ],
            [
                'Ci_Personal_Medico' => '3344556',
                'Nombres_PM' => 'Gabriela Maria',
                'Apellido_P_PM' => 'Cordova',
                'Apellido_M_PM' => 'Aguilar',
                'Telefono' => '77712300',
                'Email' => 'gabriela.cordova@hospital.com',
                'ID_Categoria' => 5, // Neumólogo
                'ID_Hospital' => 4,
                'ID_Unidad' => 10, // Neumología
                'Contrasena' => ('medico123')
            ],
            [
                'Ci_Personal_Medico' => '4455667',
                'Nombres_PM' => 'Ricardo Antonio',
                'Apellido_P_PM' => 'Mendoza',
                'Apellido_M_PM' => 'Guzman',
                'Telefono' => '77723400',
                'Email' => 'ricardo.mendoza@hospital.com',
                'ID_Categoria' => 3, // Pediatra
                'ID_Hospital' => 3,
                'ID_Unidad' => 9, // Pediatría
                'Contrasena' => ('medico123')
            ],
            [
                'Ci_Personal_Medico' => '5566778',
                'Nombres_PM' => 'Monica Elizabeth',
                'Apellido_P_PM' => 'Pena',
                'Apellido_M_PM' => 'Rios',
                'Telefono' => '77734500',
                'Email' => 'monica.pena@hospital.com',
                'ID_Categoria' => 6, // Cirujano General
                'ID_Hospital' => 1,
                'ID_Unidad' => 5, // Emergencias Adultos
                'Contrasena' => ('medico123')
            ],
            [
                'Ci_Personal_Medico' => '6677889',
                'Nombres_PM' => 'Oscar Daniel',
                'Apellido_P_PM' => 'Reyes',
                'Apellido_M_PM' => 'Miranda',
                'Telefono' => '77745600',
                'Email' => 'oscar.reyes@hospital.com',
                'ID_Categoria' => 1, // Médico General
                'ID_Hospital' => 1,
                'ID_Unidad' => 1, // Consulta Externa General
                'Contrasena' => ('medico123')
            ]
        ];

        foreach ($personalMedico as $personal) {
            Personal_Medico::create($personal);
        }
    }
}