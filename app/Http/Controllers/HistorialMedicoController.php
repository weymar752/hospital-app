<?php

namespace App\Http\Controllers;

use App\Models\Historial_Medico;
use Illuminate\Http\Request;

class HistorialMedicoController extends Controller
{
    // Mostrar todos los historiales médicos
    public function index()
    {
        // Si es un paciente autenticado, mostrar solo su historial
        $pacienteAutenticado = auth('paciente')->user();
        
        if ($pacienteAutenticado) {
            $historial = Historial_Medico::with([
                    'hospital',
                    'unidad',
                    'personalMedico'
                ])
                ->where('CI_Paciente', $pacienteAutenticado->CI_Paciente)
                ->orderBy('Fecha_Atencion', 'desc')
                ->get();
        } else {
            // Si no es paciente, mostrar vacío o redirigir a login
            $historial = collect(); // Colección vacía
        }

        return view('historial_medico.index', compact('historial'));
    }

    //  Historial de un paciente específico
    public function historialPaciente($ciPaciente)
    {
        // Verificar que el usuario autenticado sea el paciente propietario del historial
        $pacienteAutenticado = auth('paciente')->user();
        
        if (!$pacienteAutenticado || $pacienteAutenticado->CI_Paciente !== $ciPaciente) {
            abort(403, 'No tienes permiso para ver el historial médico de otro paciente.');
        }

        $historial = Historial_Medico::with([
                'hospital',
                'unidad',
                'personalMedico'
            ])
            ->where('CI_Paciente', $ciPaciente)
            ->orderBy('Fecha_Atencion', 'desc')
            ->get();

        return view('historial_medico.show', compact('historial'));
    }

    //  Guardar historial médico
    public function store(Request $request)
    {
        $request->validate([
            'No_Ficha_Medica' => 'required',
            'CI_Paciente' => 'required',
            'ID_Hospital' => 'required',
            'ID_Unidad' => 'required',
            'Ci_Personal_Medico' => 'required',
            'Fecha_Atencion' => 'required|date',
            'Diagnostico' => 'required',
            'Enfermedad_Principal' => 'required',
            'Tratamiento' => 'required',
            'Observaciones' => 'nullable',
        ]);

        Historial_Medico::create($request->all());

        return redirect()->back()->with('success', 'Historial médico registrado correctamente.');
    }
}
