<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Historial_Medico;

class HistorialMedicoSeeder extends Seeder
{
    public function run(): void
    {
        $historialesMedicos = [
            // ===== HOSPITAL OBRERO N.º 1 (ID: 1) =====
            // Historial para Adriana Marcia - Control general
            [
                'No_Ficha_Medica' => 1,
                'CI_Paciente' => '9919520',
                'ID_Hospital' => 1,
                'ID_Unidad' => 1,
                'Ci_Personal_Medico' => '9919521',
                'Fecha_Atencion' => '2024-01-20',
                'Enfermedad_Principal' => 'Control médico preventivo',
                'Diagnostico' => 'Paciente en buen estado de salud general. Signos vitales estables. Presión arterial 120/80 mmHg. Temperatura 36.5°C. No se observan anomalías significativas.',
                'Tratamiento' => 'Mantener hábitos saludables. Dieta balanceada rica en frutas y verduras. Ejercicio regular 30 minutos al día. Control anual recomendado.',
                'Observaciones' => 'Paciente cumple con controles periódicos. Se recomienda continuar con estilo de vida saludable.'
            ],
            // Historial para Adriana Marcia - Seguimiento alergias
            [
                'No_Ficha_Medica' => 2,
                'CI_Paciente' => '9919520',
                'ID_Hospital' => 1,
                'ID_Unidad' => 4,
                'Ci_Personal_Medico' => '8901234',
                'Fecha_Atencion' => '2024-02-15',
                'Enfermedad_Principal' => 'Rinitis alérgica',
                'Diagnostico' => 'Cuadro alérgico confirmado. Presencia de congestión nasal, estornudos frecuentes y lagrimeo. Pruebas cutáneas positivas para ácaros del polvo y polen.',
                'Tratamiento' => 'Antihistamínicos: Loratadina 10mg una vez al día. Corticoides nasales: Fluticasona spray nasal 2 veces al día. Evitar exposición a alérgenos conocidos.',
                'Observaciones' => 'Paciente responde bien al tratamiento. Mantener medicación durante temporada de alergias. Control en 2 meses.'
            ],
            // Historial para paciente 12345678 - Dolor torácico
            [
                'No_Ficha_Medica' => 3,
                'CI_Paciente' => '12345678',
                'ID_Hospital' => 1,
                'ID_Unidad' => 3,
                'Ci_Personal_Medico' => '1234567',
                'Fecha_Atencion' => '2024-01-18',
                'Enfermedad_Principal' => 'Hipertensión arterial leve',
                'Diagnostico' => 'Presión arterial elevada 140/90 mmHg. ECG muestra ritmo sinusal normal. Sin evidencia de hipertrofia ventricular. Antecedentes familiares de hipertensión.',
                'Tratamiento' => 'Enalapril 10mg por vía oral una vez al día. Dieta hiposódica (menos de 2g de sodio al día). Ejercicio aeróbico moderado 150 minutos por semana. Control mensual de presión arterial.',
                'Observaciones' => 'Educación sobre importancia del control de presión arterial. Llevar registro de mediciones en casa. Próxima cita en 4 semanas.'
            ],
            // Historial para paciente 90123456 - Examen laboral
            [
                'No_Ficha_Medica' => 5,
                'CI_Paciente' => '90123456',
                'ID_Hospital' => 1,
                'ID_Unidad' => 1,
                'Ci_Personal_Medico' => '6677889',
                'Fecha_Atencion' => '2024-01-25',
                'Enfermedad_Principal' => 'Examen médico ocupacional',
                'Diagnostico' => 'Evaluación médica ocupacional completa. Agudeza visual 20/20. Audiometría dentro de límites normales. Capacidad pulmonar adecuada. Apto para el puesto de trabajo.',
                'Tratamiento' => 'No requiere tratamiento. Mantener medidas de seguridad laboral. Uso de equipo de protección personal según normativas.',
                'Observaciones' => 'Trabajador apto para sus funciones. Próximo control ocupacional en 12 meses según normativa vigente.'
            ],
            // Historial para paciente 11223344 - Evaluación neurológica
            [
                'No_Ficha_Medica' => 6,
                'CI_Paciente' => '11223344',
                'ID_Hospital' => 1,
                'ID_Unidad' => 5,
                'Ci_Personal_Medico' => '1122334',
                'Fecha_Atencion' => '2024-01-26',
                'Enfermedad_Principal' => 'Migraña crónica',
                'Diagnostico' => 'Cefalea intensa unilateral con fotofobia y náuseas. Episodios recurrentes de 2-3 veces por semana. TAC cerebral sin alteraciones estructurales. Examen neurológico normal.',
                'Tratamiento' => 'Sumatriptán 50mg al inicio de síntomas. Propranolol 40mg diario como tratamiento preventivo. Evitar triggers: chocolate, estrés, falta de sueño. Mantener horarios regulares de comida y sueño.',
                'Observaciones' => 'Llevar diario de migrañas para identificar patrones. Técnicas de relajación recomendadas. Control en 6 semanas.'
            ],

            // ===== POLICONSULTORIO 20 DE OCTUBRE (ID: 2) =====
            // Historial para paciente 34567890 - Control alergias
            [
                'No_Ficha_Medica' => 7,
                'CI_Paciente' => '34567890',
                'ID_Hospital' => 2,
                'ID_Unidad' => 7,
                'Ci_Personal_Medico' => '4567890',
                'Fecha_Atencion' => '2024-01-27',
                'Enfermedad_Principal' => 'Rinitis alérgica estacional',
                'Diagnostico' => 'Cuadro alérgico estacional confirmado. Pruebas de alergia positivas para polen. Congestión nasal y estornudos frecuentes durante primavera.',
                'Tratamiento' => 'Antihistamínicos: Cetirizina 10mg diaria. Spray nasal de corticoides. Evitar exposición a polen en horas de mayor concentración (mañana temprano).',
                'Observaciones' => 'Paciente responde favorablemente a tratamiento previo. Continuar medicación durante temporada primaveral. Control en 3 meses.'
            ],
            // Historial para paciente 45678901 - Chequeo ginecológico
            [
                'No_Ficha_Medica' => 8,
                'CI_Paciente' => '45678901',
                'ID_Hospital' => 2,
                'ID_Unidad' => 8,
                'Ci_Personal_Medico' => '4567890',
                'Fecha_Atencion' => '2024-01-28',
                'Enfermedad_Principal' => 'Control ginecológico preventivo',
                'Diagnostico' => 'Examen ginecológico sin hallazgos patológicos. Papanicolaou negativo para células malignas. Ecografía pélvica normal. Ciclo menstrual regular.',
                'Tratamiento' => 'Continuar con controles anuales. Autoexploración mamaria mensual. Mantener hábitos de higiene íntima adecuados.',
                'Observaciones' => 'Paciente en buen estado de salud ginecológica. Se enfatiza importancia de controles preventivos anuales.'
            ],
            // Historial para paciente 22334455 - Alergia mariscos
            [
                'No_Ficha_Medica' => 9,
                'CI_Paciente' => '22334455',
                'ID_Hospital' => 2,
                'ID_Unidad' => 7,
                'Ci_Personal_Medico' => '2233445',
                'Fecha_Atencion' => '2024-01-29',
                'Enfermedad_Principal' => 'Alergia alimentaria a mariscos',
                'Diagnostico' => 'Urticaria generalizada y angioedema facial tras ingesta de camarones. IgE específica elevada para mariscos. Riesgo de reacción anafiláctica.',
                'Tratamiento' => 'Evitación estricta de mariscos y crustáceos. EpiPen (epinefrina autoinyectable) para emergencias. Educación sobre manejo de anafilaxia. Antihistamínicos para reacciones leves.',
                'Observaciones' => 'Paciente y familiares capacitados en uso de EpiPen. Debe llevar siempre el dispositivo. Brazalete de alerta médica recomendado.'
            ],
            // Historial para paciente 33445566 - Control asma
            [
                'No_Ficha_Medica' => 10,
                'CI_Paciente' => '33445566',
                'ID_Hospital' => 2,
                'ID_Unidad' => 9,
                'Ci_Personal_Medico' => '2233445',
                'Fecha_Atencion' => '2024-01-30',
                'Enfermedad_Principal' => 'Asma bronquial moderada persistente',
                'Diagnostico' => 'Dificultad respiratoria con sibilancias. Espirometría muestra obstrucción reversible moderada. Saturación de oxígeno 94%. Respuesta positiva a broncodilatadores.',
                'Tratamiento' => 'Salbutamol inhalador 2 puff cada 4-6 horas según necesidad. Fluticasona inhalador 250mcg 2 veces al día. Plan de acción para crisis asmáticas. Evitar exposición a humo y contaminantes.',
                'Observaciones' => 'Paciente requiere seguimiento estrecho. Técnica de inhalación correcta verificada. Control en 4 semanas con espirometría de control.'
            ],

            // ===== HOSPITAL PETROLERO OBRAJES (ID: 3) =====
            // Historial para paciente 56789012 - Control pediátrico
            [
                'No_Ficha_Medica' => 11,
                'CI_Paciente' => '56789012',
                'ID_Hospital' => 3,
                'ID_Unidad' => 9,
                'Ci_Personal_Medico' => '6789012',
                'Fecha_Atencion' => '2024-01-31',
                'Enfermedad_Principal' => 'Control pediátrico de niño sano',
                'Diagnostico' => 'Niño de 4 años en buen estado general. Desarrollo psicomotor acorde a la edad. Peso y talla dentro de percentiles normales (P50). Esquema de vacunación completo. Sin signos de alarma.',
                'Tratamiento' => 'Continuar con alimentación saludable. Suplemento de vitaminas según edad. Próximas vacunas según calendario nacional. Estimulación temprana apropiada para edad.',
                'Observaciones' => 'Crecimiento y desarrollo adecuados. Padres orientados sobre cuidados, alimentación y desarrollo. Control pediátrico en 3 meses.'
            ],
            // Historial para paciente 67890123 - Dolor abdominal
            [
                'No_Ficha_Medica' => 12,
                'CI_Paciente' => '67890123',
                'ID_Hospital' => 3,
                'ID_Unidad' => 9,
                'Ci_Personal_Medico' => '6789012',
                'Fecha_Atencion' => '2024-02-01',
                'Enfermedad_Principal' => 'Gastroenteritis aguda',
                'Diagnostico' => 'Dolor abdominal difuso con vómitos y diarrea. Signos de deshidratación leve. Abdomen blando, sin signos de irritación peritoneal. Probable origen viral.',
                'Tratamiento' => 'Hidratación oral abundante con sales de rehidratación. Dieta blanda progresiva. Probióticos. Paracetamol para dolor. Reposo relativo.',
                'Observaciones' => 'Educación a padres sobre signos de alarma: deshidratación severa, vómitos persistentes. Control en 48 horas o antes si empeora.'
            ],
            // Historial para paciente 44556677 - Presión arterial
            [
                'No_Ficha_Medica' => 13,
                'CI_Paciente' => '44556677',
                'ID_Hospital' => 3,
                'ID_Unidad' => 9,
                'Ci_Personal_Medico' => '4455667',
                'Fecha_Atencion' => '2024-02-02',
                'Enfermedad_Principal' => 'Prehipertensión arterial',
                'Diagnostico' => 'Presión arterial 135/85 mmHg en múltiples tomas. Sobrepeso con IMC 27. Estilo de vida sedentario. Sin diabetes ni otras comorbilidades.',
                'Tratamiento' => 'Modificación de estilo de vida: dieta DASH baja en sodio, pérdida de peso objetivo 5kg, ejercicio aeróbico 150 min/semana. Control en 3 meses sin medicación.',
                'Observaciones' => 'Paciente motivado para cambios. Derivado a nutricionista para plan alimentario. Monitoreo ambulatorio de presión arterial recomendado.'
            ],

            // ===== HOSPITAL DEL TÓRAX (ID: 4) =====
            // Historial para paciente 78901234 - Problemas respiratorios
            [
                'No_Ficha_Medica' => 15,
                'CI_Paciente' => '78901234',
                'ID_Hospital' => 4,
                'ID_Unidad' => 10,
                'Ci_Personal_Medico' => '5678901',
                'Fecha_Atencion' => '2024-02-04',
                'Enfermedad_Principal' => 'Bronquitis aguda',
                'Diagnostico' => 'Tos productiva con expectoración amarillenta. Fiebre 38.5°C. Crepitantes en bases pulmonares. Radiografía de tórax sin infiltrados ni consolidación.',
                'Tratamiento' => 'Amoxicilina 500mg cada 8 horas por 7 días. Mucolíticos: Acetilcisteína 600mg diario. Hidratación abundante. Reposo relativo.',
                'Observaciones' => 'Probable etiología bacteriana secundaria a infección viral. Control en 7 días o antes si presenta disnea o fiebre persistente.'
            ],
            // Historial para paciente 89012345 - Capacidad pulmonar
            [
                'No_Ficha_Medica' => 16,
                'CI_Paciente' => '89012345',
                'ID_Hospital' => 4,
                'ID_Unidad' => 10,
                'Ci_Personal_Medico' => '5678901',
                'Fecha_Atencion' => '2024-02-05',
                'Enfermedad_Principal' => 'Evaluación de función pulmonar',
                'Diagnostico' => 'Espirometría dentro de parámetros normales. FEV1 95% del predicho. CVF 98% del predicho. Sin evidencia de obstrucción ni restricción.',
                'Tratamiento' => 'No requiere tratamiento farmacológico. Mantener actividad física regular. Evitar tabaquismo activo y pasivo.',
                'Observaciones' => 'Función pulmonar normal para edad y talla. Educación sobre prevención de enfermedades respiratorias. Control anual preventivo.'
            ],
            // Historial para paciente 66778899 - Dolor torácico
            [
                'No_Ficha_Medica' => 17,
                'CI_Paciente' => '66778899',
                'ID_Hospital' => 4,
                'ID_Unidad' => 10,
                'Ci_Personal_Medico' => '3344556',
                'Fecha_Atencion' => '2024-02-06',
                'Enfermedad_Principal' => 'Neumonía adquirida en comunidad',
                'Diagnostico' => 'Disnea, dolor pleurítico, fiebre 39°C. Radiografía: infiltrado lobar en base derecha. Leucocitosis 15,000. Saturación de oxígeno 92% aire ambiente.',
                'Tratamiento' => 'Amoxicilina-clavulánico 1g cada 8 horas IV. Oxigenoterapia 2L/min por cánula nasal. Hidratación IV. Hospitalización por 5 días. Alta con antibiótico oral.',
                'Observaciones' => 'Criterios de hospitalización cumplidos (CURB-65: 2 puntos). Evolución favorable tras 48h de antibióticos. Alta con seguimiento ambulatorio.'
            ],
            // Historial para paciente 78901234 - Seguimiento asma
            [
                'No_Ficha_Medica' => 18,
                'CI_Paciente' => '78901234',
                'ID_Hospital' => 4,
                'ID_Unidad' => 10,
                'Ci_Personal_Medico' => '3344556',
                'Fecha_Atencion' => '2024-02-07',
                'Enfermedad_Principal' => 'Asma bronquial controlada',
                'Diagnostico' => 'Paciente con diagnóstico previo de asma. Buena adherencia al tratamiento. Sin exacerbaciones en últimos 3 meses. Espirometría con mejoría respecto a control anterior.',
                'Tratamiento' => 'Continuar con Budesonida/Formoterol 160/4.5mcg 2 inhalaciones cada 12 horas. Salbutamol de rescate según necesidad. Plan de acción actualizado.',
                'Observaciones' => 'Asma bien controlada. Técnica de inhalación correcta. Identificar y evitar desencadenantes. Control en 3 meses con espirometría.'
            ],

            // ===== ADICIONALES HOSPITAL OBRERO (ID: 1) =====
            // Historial para paciente 12345678 - Control cardíaco
            [
                'No_Ficha_Medica' => 19,
                'CI_Paciente' => '12345678',
                'ID_Hospital' => 1,
                'ID_Unidad' => 3,
                'Ci_Personal_Medico' => '9012345',
                'Fecha_Atencion' => '2024-02-08',
                'Enfermedad_Principal' => 'Hipertensión arterial controlada',
                'Diagnostico' => 'Presión arterial 130/85 mmHg bajo tratamiento con Enalapril. Buena adherencia terapéutica. ECG sin cambios respecto a previo. Sin síntomas cardiovasculares.',
                'Tratamiento' => 'Continuar con Enalapril 10mg una vez al día. Mantener dieta hiposódica y restricción de sodio. Control de peso. Actividad física regular. Monitoreo domiciliario de presión arterial.',
                'Observaciones' => 'Buen control de cifras tensionales con monoterapia. Paciente educado sobre signos de alarma cardiovascular. Próximo control en 3 meses.'
            ],
            // Historial para paciente 23456789 - Reevaluación neurológica
            [
                'No_Ficha_Medica' => 20,
                'CI_Paciente' => '23456789',
                'ID_Hospital' => 1,
                'ID_Unidad' => 4,
                'Ci_Personal_Medico' => '3456789',
                'Fecha_Atencion' => '2024-02-09',
                'Enfermedad_Principal' => 'Migraña con aura - seguimiento',
                'Diagnostico' => 'Reducción en frecuencia de episodios de migraña con tratamiento preventivo. Actualmente 1 episodio cada 3 semanas. Duración e intensidad disminuidas.',
                'Tratamiento' => 'Continuar con Propranolol 40mg diario. Sumatriptán 50mg para episodios agudos. Mantener diario de migrañas. Técnicas de manejo de estrés.',
                'Observaciones' => 'Buena respuesta al tratamiento preventivo. Identificados triggers principales: falta de sueño y estrés laboral. Control en 2 meses.'
            ],

            // ===== ADICIONAL POLICONSULTORIO (ID: 2) =====
            // Historial para paciente 34567890 - Control general
            [
                'No_Ficha_Medica' => 21,
                'CI_Paciente' => '34567890',
                'ID_Hospital' => 2,
                'ID_Unidad' => 1,
                'Ci_Personal_Medico' => '4567890',
                'Fecha_Atencion' => '2024-02-10',
                'Enfermedad_Principal' => 'Control médico general',
                'Diagnostico' => 'Paciente en buen estado general. Signos vitales normales: PA 115/75 mmHg, FC 72 lpm, FR 16 rpm, T° 36.6°C. Examen físico sin alteraciones.',
                'Tratamiento' => 'Mantener hábitos saludables. Dieta balanceada. Ejercicio regular 150 minutos semanales. Hidratación adecuada. Control anual preventivo.',
                'Observaciones' => 'Paciente asintomático sin factores de riesgo cardiovascular. Laboratorios previos normales. Próximo control en 1 año.'
            ],

            // ===== ADICIONAL HOSPITAL PETROLERO (ID: 3) =====
            // Historial para paciente 56789012 - Vacunación
            [
                'No_Ficha_Medica' => 22,
                'CI_Paciente' => '56789012',
                'ID_Hospital' => 3,
                'ID_Unidad' => 9,
                'Ci_Personal_Medico' => '6789012',
                'Fecha_Atencion' => '2024-02-11',
                'Enfermedad_Principal' => 'Control pediátrico y vacunación',
                'Diagnostico' => 'Niño sano de 4 años. Peso 17kg (P50), Talla 105cm (P50). Desarrollo psicomotor normal. Esquema de vacunación completo hasta la fecha.',
                'Tratamiento' => 'Vacuna DPT (refuerzo) aplicada hoy. Vitamina D 400 UI diaria. Hierro según necesidad. Dieta variada y nutritiva. Higiene bucal diaria.',
                'Observaciones' => 'Crecimiento adecuado. Padres orientados sobre desarrollo esperado. Próxima vacuna a los 5 años. Control en 6 meses.'
            ],

            // ===== ADICIONAL HOSPITAL DEL TÓRAX (ID: 4) =====
            // Historial para paciente 89012345 - Prueba esfuerzo
            [
                'No_Ficha_Medica' => 23,
                'CI_Paciente' => '89012345',
                'ID_Hospital' => 4,
                'ID_Unidad' => 10,
                'Ci_Personal_Medico' => '5678901',
                'Fecha_Atencion' => '2024-02-12',
                'Enfermedad_Principal' => 'Evaluación de capacidad funcional pulmonar',
                'Diagnostico' => 'Prueba de esfuerzo cardiopulmonar realizada. VO2 máx 35 ml/kg/min (normal para edad). Sin desaturación durante ejercicio. Frecuencia cardíaca apropiada.',
                'Tratamiento' => 'No requiere tratamiento. Continuar con programa de ejercicio actual. Mantener actividad física regular para preservar capacidad aeróbica.',
                'Observaciones' => 'Capacidad funcional pulmonar y cardiovascular normales. Apto para actividades físicas sin restricciones. Control anual preventivo.'
            ]
        ];

        foreach ($historialesMedicos as $historial) {
            Historial_Medico::create($historial);
        }
    }
}
