<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\Hospital;
use App\Models\Historial_Medico;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index()
    {
        $pacientes = Paciente::with(['hospital', 'historialMedico'])->get();

        return view('pacientes.index', compact('pacientes'));
    }

    public function create()
    {
        $hospitales = Hospital::all();
        return view('pacientes.create', compact('hospitales'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'CI_Paciente' => 'required',
            'Nombres' => 'required',
            'Apellido_P' => 'required',
            'Apellido_M' => 'required',
            'Fecha_Nacimiento' => 'required|date',
            'Tipo_Sangre' => 'required',
            'Alergias' => 'nullable',
            'ID_Hospital' => 'required',
            'Contrasena' => 'required',
        ]);

        // Comprobar si ya existe un paciente con el mismo CI
        $existingPaciente = Paciente::where('CI_Paciente', $request->CI_Paciente)->first();
        if ($existingPaciente) {
            return redirect()->back()->withInput()->with('error', 'El CI que ingresaste ya está registrado en el sistema');
        }

        Paciente::create($request->all());

        // Redirección condicional según sesión:
        // - Si no hay usuario logueado, mostrar notificación y luego redirigir al login.
        // - Si el usuario es personal médico, enviar a pacientes.index.
        // - En cualquier otro caso, volver a la página anterior con mensaje.
        if (!session()->has('usuario')) {
            return redirect()->back()
                ->with('success_message', 'Paciente registrado exitosamente. Por favor inicie sesión.')
                ->with('redirect_to_login', true);
        }

        $tipoUsuario = session('tipo_usuario');
        if ($tipoUsuario === 'medico' || $tipoUsuario === 'personal_medico') {
            return redirect()->route('pacientes.index')->with('success', 'Paciente registrado.');
        }

        return redirect()->back()->with('success', 'Paciente registrado.');
    }

    public function edit($id)
    {
        $paciente = Paciente::findOrFail($id);
        $hospitales = Hospital::all();

        return view('pacientes.edit', compact('paciente', 'hospitales'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nombres' => 'required',
            'Apellido_P' => 'required',
            'Apellido_M' => 'required',
            'Fecha_Nacimiento' => 'required|date',
            'Tipo_Sangre' => 'required',
            'ID_Hospital' => 'required',
        ]);

        Paciente::findOrFail($id)->update($request->all());

        return redirect()->route('pacientes.index')->with('success', 'Paciente actualizado.');
    }

    public function destroy($id)
    {
        Paciente::destroy($id);
        return redirect()->route('pacientes.index')->with('success', 'Paciente eliminado.');
    }
}
