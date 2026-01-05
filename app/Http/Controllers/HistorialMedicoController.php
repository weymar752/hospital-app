<?php

namespace App\Http\Controllers;

use App\Models\Historial_Medico;
use Illuminate\Http\Request;

class HistorialMedicoController extends Controller
{
    // Mostrar el historial médico del paciente autenticado
    public function index()
    {
        // Obtener el paciente autenticado desde la sesión
        $ciPaciente = session('usuario');
        
        // 🔍 DEBUG - Eliminar después de verificar
        dd([
            'ci_paciente' => $ciPaciente,
            'tipo_usuario' => session('tipo_usuario'),
            'total_historiales_bd' => Historial_Medico::count(),
            'historiales_este_ci' => Historial_Medico::where('CI_Paciente', $ciPaciente)->count(),
            'todos_los_ci_en_bd' => Historial_Medico::pluck('CI_Paciente')->unique()->toArray()
        ]);
        
        if (!$ciPaciente || session('tipo_usuario') !== 'paciente') {
            return view('historial_medico.index', ['historial' => collect()]);
        }

        $historial = Historial_Medico::with([
                'hospital',
                'unidad',
                'personalMedico',
                'paciente'
            ])
            ->where('CI_Paciente', $ciPaciente)
            ->orderBy('Fecha_Atencion', 'desc')
            ->get();

        return view('historial_medico.index', compact('historial'));
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
