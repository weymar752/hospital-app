<?php

namespace App\Http\Controllers;

use App\Models\Ficha_Medica;
use App\Models\Paciente;
use App\Models\Personal_Medico;
use App\Models\Hospital;
use App\Models\Unidad;
use Illuminate\Http\Request;

class FichaMedicaController extends Controller
{
    public function index(Request $request)
{
    $usuario = session('usuario');
    $tipoUsuario = session('tipo_usuario');

    $query = Ficha_Medica::select(
        'Ficha_Medica.*',               // Cambiado de ficha_medica.*
        'Paciente.Nombres',             // Cambiado de paciente.Nombres
        'Paciente.Apellido_P',
        'Paciente.Apellido_M',
        'Personal_Medico.Nombres_PM',   // Cambiado de personal_medico
        'Personal_Medico.Apellido_P_PM',
        'Hospital.Nombre_Hospital',     // Cambiado de hospital
        'Unidad.Nombre_Unidad'          // Cambiado de unidad
    )
    // Los nombres en el primer parámetro de join deben ser EXACTOS a la DB
    ->join('Paciente', 'Paciente.CI_Paciente', '=', 'Ficha_Medica.CI_Paciente')
    ->join('Personal_Medico', 'Personal_Medico.Ci_Personal_Medico', '=', 'Ficha_Medica.Ci_Personal_Medico')
    ->join('Hospital', 'Hospital.ID_Hospital', '=', 'Ficha_Medica.ID_Hospital')
    ->join('Unidad', 'Unidad.ID_Unidad', '=', 'Ficha_Medica.ID_Unidad');

    // Filtrar por tipo de usuario
    if ($tipoUsuario === 'paciente') {
        $query->where('Ficha_Medica.CI_Paciente', $usuario->CI_Paciente);
    } elseif ($tipoUsuario === 'medico') {
        // Médico solo ve fichas de su hospital
        $query->where('Ficha_Medica.ID_Hospital', $usuario->ID_Hospital);
        
        // Aplicar filtros adicionales para médicos
        if ($request->has('fecha') && $request->fecha === 'hoy') {
            $query->whereDate('Ficha_Medica.Fecha_Cita', now()->toDateString());
        }
        
        if ($request->has('estado') && $request->estado !== 'todas') {
            $query->where('Ficha_Medica.Estado_Cita', $request->estado);
        }
        
        if ($request->has('unidad') && $request->unidad !== 'todas') {
            $query->where('Ficha_Medica.ID_Unidad', $request->unidad);
        }
    }

    $fichas = $query->orderBy('Ficha_Medica.Fecha_Cita', 'desc')
                    ->orderBy('Ficha_Medica.Hora_Cita', 'asc')
                    ->get();

    // Obtener unidades del hospital del médico para el filtro
    $unidades = collect(); // Colección vacía por defecto
    if ($tipoUsuario === 'medico' && $usuario) {
        $unidades = Unidad::where('ID_Hospital', $usuario->ID_Hospital)->get();
    }

    return view('fichas.index', compact('fichas', 'unidades'));
}

    public function create()
    {
        $usuario = session('usuario');
        $tipoUsuario = session('tipo_usuario');

        // Obtener pacientes
        if ($tipoUsuario === 'paciente') {
            $pacientes = Paciente::where('CI_Paciente', $usuario->CI_Paciente)->get();
        } else {
            $pacientes = Paciente::all();
        }

        $medicos = Personal_Medico::all();
        $hospitales = Hospital::all();
        

        // Obtener unidades excluyendo las que pertenecen al departamento con ID 3
        $unidades = Unidad::where('ID_Departamento', '!=', 3)->get();

        return view('fichas.create', compact('pacientes', 'medicos', 'hospitales', 'unidades'));
    }

    public function getHorasOcupadas(Request $request)
    {
        $fecha = $request->query('fecha');
        $medico = $request->query('medico');
        $unidad = $request->query('unidad');

        if (!$fecha || !$medico || !$unidad) {
            return response()->json([]);
        }

        $horasOcupadas = Ficha_Medica::where('Fecha_Cita', $fecha)
            ->where('Ci_Personal_Medico', $medico)
            ->where('ID_Unidad', $unidad)
            ->where('Estado_Cita', '!=', 'Cancelada')
            ->pluck('Hora_Cita')
            ->toArray();

        return response()->json($horasOcupadas);
    }

    public function store(Request $request)
    {
        $request->validate([
            'CI_Paciente' => 'required',
            'Fecha_Cita' => 'required|date|after_or_equal:today',
            'Hora_Cita' => 'required',
            'Estado_Cita' => 'required|in:Programada,Completada,Cancelada',
            'Motivo_Consulta' => 'required',
            'ID_Unidad' => 'required',
            'Ci_Personal_Medico' => 'required',
            'ID_Hospital' => 'required'
        ]);

        // Validar horario permitido (8:00 AM a 6:00 PM)
        $hora = explode(':', $request->Hora_Cita);
        if (count($hora) >= 2) {
            $horaNum = (int)$hora[0];
            $minutoNum = (int)$hora[1];
            if ($horaNum < 8 || $horaNum > 18 || ($horaNum === 18 && $minutoNum > 0)) {
                return back()
                    ->withInput()
                    ->with('error', 'El horario de atención es de 8:00 AM a 6:00 PM.');
            }
        }

        // Validar que la fecha y hora no sea en el pasado
        $fechaHoraCita = \Carbon\Carbon::parse($request->Fecha_Cita . ' ' . $request->Hora_Cita);
        if ($fechaHoraCita->isPast()) {
            return back()
                ->withInput()
                ->with('error', 'No puedes programar una cita en fecha/hora pasada.');
        }

        // Verificar si ya existe una ficha en la misma fecha, hora, unidad y médico
        $fichaExistente = Ficha_Medica::where('Fecha_Cita', $request->Fecha_Cita)
            ->where('Hora_Cita', $request->Hora_Cita)
            ->where('Ci_Personal_Medico', $request->Ci_Personal_Medico)
            ->where('ID_Unidad', $request->ID_Unidad)
            ->where('Estado_Cita', '!=', 'Cancelada')
            ->first();

        if ($fichaExistente) {
            return back()
                ->withInput()
                ->with('error', 'Ya existe una cita programada para este médico en la misma fecha, hora y unidad.');
        }

        // Crear la ficha médica con fecha de creación automática
        $ficha = Ficha_Medica::create([
            'CI_Paciente' => $request->CI_Paciente,
            'Fecha_Creacion' => now()->format('Y-m-d'), // Fecha actual del servidor
            'Fecha_Cita' => $request->Fecha_Cita,
            'Hora_Cita' => $request->Hora_Cita,
            'Estado_Cita' => $request->Estado_Cita,
            'Motivo_Consulta' => $request->Motivo_Consulta,
            'ID_Unidad' => $request->ID_Unidad,
            'Ci_Personal_Medico' => $request->Ci_Personal_Medico,
            'ID_Hospital' => $request->ID_Hospital
        ]);

        // Preparar notificación si el creador es un paciente
        $notification = null;
        if (session('tipo_usuario') === 'paciente') {
            $unidad = \App\Models\Unidad::find($request->ID_Unidad);
            $hospital = \App\Models\Hospital::find($request->ID_Hospital);

            $notification = [
                'Fecha_Cita' => $ficha->Fecha_Cita,
                'Hora_Cita' => $ficha->Hora_Cita,
                'Nombre_Unidad' => $unidad ? $unidad->Nombre_Unidad : '',
                'Nombre_Hospital' => $hospital ? $hospital->Nombre_Hospital : '',
            ];
        }

        $redirect = redirect()->route('fichas.index')->with('success', 'Ficha médica creada correctamente.');

        if ($notification) {
            $redirect->with('notification', $notification);
        }

        return $redirect;
    }

    public function updateEstado(Request $request, $id)
    {
        try {
            $ficha = Ficha_Medica::findOrFail($id);
            
            $request->validate([
                'Estado_Cita' => 'required|in:Programada,Completada,Cancelada'
            ]);

            $ficha->Estado_Cita = $request->Estado_Cita;
            $ficha->save();

            return redirect()->route('fichas.index')
                ->with('success', 'Estado de la cita actualizado correctamente.');

        } catch (\Exception $e) {
            return redirect()->route('fichas.index')
                ->with('error', 'Error al actualizar el estado: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        Ficha_Medica::destroy($id);

        return redirect()->route('fichas.index')
                         ->with('success', 'Ficha médica eliminada.');
    }
}