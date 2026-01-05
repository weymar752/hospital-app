<?php

namespace App\Http\Controllers;

use App\Models\Historial_Medico;
use Illuminate\Http\Request;

class HistorialMedicoController extends Controller
{
    // Mostrar el historial médico del paciente autenticado
    public function index()
    {
        // Obtener el CI del paciente autenticado desde la sesión
        $ciPaciente = session('ci_usuario');
        
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

    // Mostrar formulario para crear historial médico
    public function create(Request $request)
    {
        $fichaId = $request->query('ficha');
        $ficha = null;
        
        if ($fichaId) {
            $ficha = \App\Models\Ficha_Medica::with(['paciente', 'hospital', 'unidad', 'personalMedico'])
                ->find($fichaId);
        }
        
        return view('historial_medico.create', compact('ficha'));
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
