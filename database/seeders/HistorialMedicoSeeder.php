<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Historial_Medico;
use App\Models\Ficha_Medica;

class HistorialMedicoSeeder extends Seeder
{
    public function run(): void
    {
        // Obtener solo fichas COMPLETADAS
        $fichasCompletadas = Ficha_Medica::where('Estado_Cita', 'Completada')->get();

        foreach ($fichasCompletadas as $ficha) {

            Historial_Medico::create([
                'No_Ficha_Medica' => $ficha->No_Ficha_Medica,
                'CI_Paciente' => $ficha->CI_Paciente,
                'ID_Hospital' => $ficha->ID_Hospital,
                'ID_Unidad' => $ficha->ID_Unidad,
                'Ci_Personal_Medico' => $ficha->Ci_Personal_Medico,

                'Fecha_Atencion' => $ficha->Fecha_Cita,

                'Enfermedad_Principal' => $this->enfermedadPorUnidad($ficha->ID_Unidad),
                'Diagnostico' => $this->diagnosticoPorUnidad($ficha->ID_Unidad),
                'Tratamiento' => $this->tratamientoPorUnidad($ficha->ID_Unidad),
                'Observaciones' => 'Paciente atendido sin complicaciones. Se recomienda seguimiento médico.',
            ]);
        }
    }

    // =======================
    // MÉTODOS AUXILIARES
    // =======================

    private function enfermedadPorUnidad($unidad)
    {
        return match ($unidad) {
            1 => 'Control general de salud',
            3 => 'Hipertensión arterial',
            4 => 'Rinitis alérgica',
            5 => 'Migraña crónica',
            7 => 'Alergia alimentaria',
            8 => 'Control ginecológico',
            9 => 'Infección respiratoria leve',
            10 => 'Asma bronquial',
            default => 'Evaluación médica general',
        };
    }

    private function diagnosticoPorUnidad($unidad)
    {
        return match ($unidad) {
            1 => 'Paciente en buen estado general. Signos vitales normales.',
            3 => 'Presión arterial elevada, requiere control periódico.',
            4 => 'Reacción alérgica estacional confirmada.',
            5 => 'Migraña con antecedentes familiares.',
            7 => 'Reacción alérgica moderada confirmada.',
            8 => 'Examen ginecológico sin hallazgos patológicos.',
            9 => 'Infección respiratoria leve, sin complicaciones.',
            10 => 'Asma controlada, requiere seguimiento.',
            default => 'Evaluación médica realizada.',
        };
    }

    private function tratamientoPorUnidad($unidad)
    {
        return match ($unidad) {
            1 => 'Recomendaciones generales y control anual.',
            3 => 'Antihipertensivos y control mensual.',
            4 => 'Antihistamínicos y evitar alérgenos.',
            5 => 'Analgésicos y control neurológico.',
            7 => 'Antihistamínicos y dieta controlada.',
            8 => 'Control anual y recomendaciones preventivas.',
            9 => 'Antibióticos leves y reposo.',
            10 => 'Broncodilatadores y control neumológico.',
            default => 'Tratamiento según evaluación médica.',
        };
    }
}
