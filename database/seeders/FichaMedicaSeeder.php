<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ficha_Medica;

class FichaMedicaSeeder extends Seeder
{
    public function run(): void
    {
        $fichasMedicas = [
            // ===== HOSPITAL OBRERO N.º 1 (ID: 1) =====
            // Fichas para Adriana Marcia
            [
                'CI_Paciente' => '9919520',
                'Fecha_Creacion' => '2024-01-15',
                'Fecha_Cita' => '2024-01-20',
                'Hora_Cita' => '08:30:00',
                'Estado_Cita' => 'Completada',
                'Motivo_Consulta' => 'Control médico general y chequeo de rutina',
                'ID_Unidad' => 1, // Consulta Externa General
                'Ci_Personal_Medico' => '9919521', // Weymar Rodrigo
                'ID_Hospital' => 1
            ],
            [
                'CI_Paciente' => '9919520',
                'Fecha_Creacion' => '2024-02-10',
                'Fecha_Cita' => '2024-02-15',
                'Hora_Cita' => '09:00:00',
                'Estado_Cita' => 'Programada',
                'Motivo_Consulta' => 'Seguimiento de tratamiento para alergias',
                'ID_Unidad' => 4, // Alergología
                'Ci_Personal_Medico' => '8901234', // Sandra Lucia
                'ID_Hospital' => 1
            ],

            // Fichas para otros pacientes del Hospital Obrero
            [
                'CI_Paciente' => '12345678',
                'Fecha_Creacion' => '2024-01-16',
                'Fecha_Cita' => '2024-01-18',
                'Hora_Cita' => '10:15:00',
                'Estado_Cita' => 'Completada',
                'Motivo_Consulta' => 'Dolor torácico y evaluación cardíaca',
                'ID_Unidad' => 3, // Cardiología
                'Ci_Personal_Medico' => '1234567', // Juan Carlos - Cardiólogo
                'ID_Hospital' => 1
            ],
            [
                'CI_Paciente' => '23456789',
                'Fecha_Creacion' => '2024-01-17',
                'Fecha_Cita' => '2024-01-22',
                'Hora_Cita' => '11:30:00',
                'Estado_Cita' => 'Cancelada',
                'Motivo_Consulta' => 'Consulta por migrañas frecuentes',
                'ID_Unidad' => 5, // Neurología
                'Ci_Personal_Medico' => '2345678', // Maria Elena
                'ID_Hospital' => 1
            ],
            [
                'CI_Paciente' => '90123456',
                'Fecha_Creacion' => '2024-01-18',
                'Fecha_Cita' => '2024-01-25',
                'Hora_Cita' => '14:00:00',
                'Estado_Cita' => 'Completada',
                'Motivo_Consulta' => 'Examen médico laboral',
                'ID_Unidad' => 1, // Consulta Externa General
                'Ci_Personal_Medico' => '6677889', // Oscar Daniel
                'ID_Hospital' => 1
            ],
            [
                'CI_Paciente' => '11223344',
                'Fecha_Creacion' => '2024-01-19',
                'Fecha_Cita' => '2024-01-26',
                'Hora_Cita' => '15:45:00',
                'Estado_Cita' => 'Programada',
                'Motivo_Consulta' => 'Evaluación neurológica por mareos',
                'ID_Unidad' => 5, // Neurología
                'Ci_Personal_Medico' => '1122334', // Patricia Andrea - Neuróloga
                'ID_Hospital' => 1
            ],

            // ===== POLICONSULTORIO 20 DE OCTUBRE (ID: 2) =====
            [
                'CI_Paciente' => '34567890',
                'Fecha_Creacion' => '2024-01-20',
                'Fecha_Cita' => '2024-01-27',
                'Hora_Cita' => '08:00:00',
                'Estado_Cita' => 'Completada',
                'Motivo_Consulta' => 'Control de alergias estacionales',
                'ID_Unidad' => 7, // Alergología
                'Ci_Personal_Medico' => '4567890', // Ana Patricia
                'ID_Hospital' => 2
            ],
            [
                'CI_Paciente' => '45678901',
                'Fecha_Creacion' => '2024-01-21',
                'Fecha_Cita' => '2024-01-28',
                'Hora_Cita' => '09:30:00',
                'Estado_Cita' => 'Completada',
                'Motivo_Consulta' => 'Chequeo ginecológico anual',
                'ID_Unidad' => 8, // Ginecología
                'Ci_Personal_Medico' => '4567890', // Ana Patricia
                'ID_Hospital' => 2
            ],
            [
                'CI_Paciente' => '22334455',
                'Fecha_Creacion' => '2024-01-22',
                'Fecha_Cita' => '2024-01-29',
                'Hora_Cita' => '11:00:00',
                'Estado_Cita' => 'Programada',
                'Motivo_Consulta' => 'Reacción alérgica a mariscos',
                'ID_Unidad' => 7, // Alergología
                'Ci_Personal_Medico' => '2233445', // Fernando Jose
                'ID_Hospital' => 2
            ],
            [
                'CI_Paciente' => '33445566',
                'Fecha_Creacion' => '2024-01-23',
                'Fecha_Cita' => '2024-01-30',
                'Hora_Cita' => '13:15:00',
                'Estado_Cita' => 'Completada',
                'Motivo_Consulta' => 'Control de asma y tratamiento',
                'ID_Unidad' => 9, // Neumología
                'Ci_Personal_Medico' => '2233445', // Fernando Jose
                'ID_Hospital' => 2
            ],

            // ===== HOSPITAL PETROLERO OBRAJES (ID: 3) =====
            [
                'CI_Paciente' => '56789012',
                'Fecha_Creacion' => '2024-01-24',
                'Fecha_Cita' => '2024-01-31',
                'Hora_Cita' => '10:30:00',
                'Estado_Cita' => 'Completada',
                'Motivo_Consulta' => 'Consulta pediátrica para control de niño',
                'ID_Unidad' => 9, // Pediatría
                'Ci_Personal_Medico' => '6789012', // Laura Sofia - Pediatra
                'ID_Hospital' => 3
            ],
            [
                'CI_Paciente' => '67890123',
                'Fecha_Creacion' => '2024-01-25',
                'Fecha_Cita' => '2024-02-01',
                'Hora_Cita' => '14:45:00',
                'Estado_Cita' => 'Programada',
                'Motivo_Consulta' => 'Dolor abdominal y evaluación general',
                'ID_Unidad' => 9, // Pediatría
                'Ci_Personal_Medico' => '6789012', // Laura Sofia - Pediatra
                'ID_Hospital' => 3
            ],
            [
                'CI_Paciente' => '44556677',
                'Fecha_Creacion' => '2024-01-26',
                'Fecha_Cita' => '2024-02-02',
                'Hora_Cita' => '16:00:00',
                'Estado_Cita' => 'Completada',
                'Motivo_Consulta' => 'Control de presión arterial',
                'ID_Unidad' => 9, // Pediatría
                'Ci_Personal_Medico' => '4455667', // Ricardo Antonio - Pediatra
                'ID_Hospital' => 3
            ],
            [
                'CI_Paciente' => '55667788',
                'Fecha_Creacion' => '2024-01-27',
                'Fecha_Cita' => '2024-02-03',
                'Hora_Cita' => '08:30:00',
                'Estado_Cita' => 'Cancelada',
                'Motivo_Consulta' => 'Alergia al latex - evaluación',
                'ID_Unidad' => 9, // Pediatría
                'Ci_Personal_Medico' => '4455667', // Ricardo Antonio - Pediatra
                'ID_Hospital' => 3
            ],

            // ===== HOSPITAL DEL TÓRAX (ID: 4) =====
            [
                'CI_Paciente' => '78901234',
                'Fecha_Creacion' => '2024-01-28',
                'Fecha_Cita' => '2024-02-04',
                'Hora_Cita' => '09:15:00',
                'Estado_Cita' => 'Completada',
                'Motivo_Consulta' => 'Problemas respiratorios y tos persistente',
                'ID_Unidad' => 10, // Neumología
                'Ci_Personal_Medico' => '5678901', // Roberto Andres - Neumólogo
                'ID_Hospital' => 4
            ],
            [
                'CI_Paciente' => '89012345',
                'Fecha_Creacion' => '2024-01-29',
                'Fecha_Cita' => '2024-02-05',
                'Hora_Cita' => '11:30:00',
                'Estado_Cita' => 'Programada',
                'Motivo_Consulta' => 'Evaluación de capacidad pulmonar',
                'ID_Unidad' => 10, // Neumología
                'Ci_Personal_Medico' => '5678901', // Roberto Andres - Neumólogo
                'ID_Hospital' => 4
            ],
            [
                'CI_Paciente' => '66778899',
                'Fecha_Creacion' => '2024-01-30',
                'Fecha_Cita' => '2024-02-06',
                'Hora_Cita' => '15:00:00',
                'Estado_Cita' => 'Completada',
                'Motivo_Consulta' => 'Dolor en el pecho y dificultad para respirar',
                'ID_Unidad' => 10, // Neumología
                'Ci_Personal_Medico' => '3344556', // Gabriela Maria - Neumóloga
                'ID_Hospital' => 4
            ],
            [
                'CI_Paciente' => '78901234',
                'Fecha_Creacion' => '2024-01-31',
                'Fecha_Cita' => '2024-02-07',
                'Hora_Cita' => '16:45:00',
                'Estado_Cita' => 'Programada',
                'Motivo_Consulta' => 'Seguimiento de tratamiento para asma',
                'ID_Unidad' => 10, // Neumología
                'Ci_Personal_Medico' => '3344556', // Gabriela Maria - Neumóloga
                'ID_Hospital' => 4
            ],

            // Fichas adicionales para completar 15 por hospital
            // Hospital Obrero adicionales
            [
                'CI_Paciente' => '12345678',
                'Fecha_Creacion' => '2024-02-01',
                'Fecha_Cita' => '2024-02-08',
                'Hora_Cita' => '08:00:00',
                'Estado_Cita' => 'Programada',
                'Motivo_Consulta' => 'Control cardíaco post-tratamiento',
                'ID_Unidad' => 3, // Cardiología
                'Ci_Personal_Medico' => '9012345', // Jorge Luis - Cardiólogo
                'ID_Hospital' => 1
            ],
            [
                'CI_Paciente' => '23456789',
                'Fecha_Creacion' => '2024-02-02',
                'Fecha_Cita' => '2024-02-09',
                'Hora_Cita' => '10:30:00',
                'Estado_Cita' => 'Programada',
                'Motivo_Consulta' => 'Reevaluación neurológica',
                'ID_Unidad' => 4, // Neurología
                'Ci_Personal_Medico' => '3456789', // Carlos Alberto - Neurólogo
                'ID_Hospital' => 1
            ],

            // Policonsultorio adicionales
            [
                'CI_Paciente' => '34567890',
                'Fecha_Creacion' => '2024-02-03',
                'Fecha_Cita' => '2024-02-10',
                'Hora_Cita' => '13:00:00',
                'Estado_Cita' => 'Programada',
                'Motivo_Consulta' => 'Control médico general',
                'ID_Unidad' => 1, // Consulta Externa General
                'Ci_Personal_Medico' => '4567890', // Ana Patricia
                'ID_Hospital' => 2
            ],

            // Hospital Petrolero adicional
            [
                'CI_Paciente' => '56789012',
                'Fecha_Creacion' => '2024-02-04',
                'Fecha_Cita' => '2024-02-11',
                'Hora_Cita' => '14:20:00',
                'Estado_Cita' => 'Programada',
                'Motivo_Consulta' => 'Vacunación y control infantil',
                'ID_Unidad' => 9, // Pediatría
                'Ci_Personal_Medico' => '6789012', // Laura Sofia - Pediatra
                'ID_Hospital' => 3
            ],

            // Hospital del Tórax adicional
            [
                'CI_Paciente' => '89012345',
                'Fecha_Creacion' => '2024-02-05',
                'Fecha_Cita' => '2024-02-12',
                'Hora_Cita' => '17:00:00',
                'Estado_Cita' => 'Programada',
                'Motivo_Consulta' => 'Prueba de esfuerzo pulmonar',
                'ID_Unidad' => 10, // Neumología
                'Ci_Personal_Medico' => '5678901', // Roberto Andres - Neumólogo
                'ID_Hospital' => 4
            ]
        ];

        foreach ($fichasMedicas as $ficha) {
            Ficha_Medica::create($ficha);
        }
    }
}