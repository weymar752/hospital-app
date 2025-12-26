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
    public function index()
    {
        $usuario = session('usuario');
        $tipoUsuario = session('tipo_usuario');

        $query = Ficha_Medica::select(
            'ficha_medica.*',
            'paciente.Nombres',
            'paciente.Apellido_P',
            'paciente.Apellido_M',
            'personal_medico.Nombres_PM',
            'personal_medico.Apellido_P_PM',
            'hospital.Nombre_Hospital',
            'unidad.Nombre_Unidad'
        )
        ->join('paciente', 'paciente.CI_Paciente', '=', 'ficha_medica.CI_Paciente')
        ->join('personal_medico', 'personal_medico.Ci_Personal_Medico', '=', 'ficha_medica.Ci_Personal_Medico')
        ->join('hospital', 'hospital.ID_Hospital', '=', 'ficha_medica.ID_Hospital')
        ->join('unidad', 'unidad.ID_Unidad', '=', 'ficha_medica.ID_Unidad');

        // Si es paciente, solo ve sus propias fichas
        if ($tipoUsuario === 'paciente') {
            $query->where('ficha_medica.CI_Paciente', $usuario->CI_Paciente);
        }

        $fichas = $query->get();

        return view('fichas.index', compact('fichas'));
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

        // Verificar si ya existe una ficha en la misma fecha y hora para el mismo médico
        $fichaExistente = Ficha_Medica::where('Fecha_Cita', $request->Fecha_Cita)
            ->where('Hora_Cita', $request->Hora_Cita)
            ->where('Ci_Personal_Medico', $request->Ci_Personal_Medico)
            ->where('ID_Unidad', $request->ID_Unidad)
            ->first();

        if ($fichaExistente) {
            return back()
                ->withInput()
                ->with('error', 'Ya existe una cita programada para este médico en la misma fecha y hora.');
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

        $redirect = redirect()->route('fichas-medicas.index')->with('success', 'Ficha médica creada correctamente.');

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

            return redirect()->route('fichas-medicas.index')
                ->with('success', 'Estado de la cita actualizado correctamente.');

        } catch (\Exception $e) {
            return redirect()->route('fichas-medicas.index')
                ->with('error', 'Error al actualizar el estado: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        Ficha_Medica::destroy($id);

        return redirect()->route('fichas-medicas.index')
                         ->with('success', 'Ficha médica eliminada.');
    }
}