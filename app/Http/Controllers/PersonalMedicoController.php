<?php

namespace App\Http\Controllers;

use App\Models\Personal_Medico;
use App\Models\Hospital;
use App\Models\Categoria;
use App\Models\Unidad;
use Illuminate\Http\Request;

class PersonalMedicoController extends Controller
{
    /**
     * Mostrar listado de personal médico
     */
    public function index()
    {
        $personal_medico = Personal_Medico::with(['hospital', 'categoria', 'unidad'])->get();

        return view('personal_medico.index', compact('personal_medico'));
    }

    /**
     * Mostrar formulario de creación
     */
    public function create()
    {
        $hospitales = Hospital::all();
        $categorias = Categoria::all();
        $unidades = Unidad::all();

        return view('personal_medico.create', compact('hospitales', 'categorias', 'unidades'));
    }

    /**
     * Guardar personal médico en BD
     */
    public function store(Request $request)
    {
        $request->validate([
            'Ci_Personal_Medico' => 'required|numeric|unique:personal_medico,Ci_Personal_Medico',
            'Nombres_PM' => 'required|string',
            'Apellido_P_PM' => 'required|string',
            'Apellido_M_PM' => 'required|string',
            'Telefono' => 'required|string',
            'Email' => 'required|email',
            'ID_Categoria' => 'required|exists:categoria,ID_Categoria',
            'ID_Hospital' => 'required|exists:hospital,ID_Hospital',
            'ID_Unidad' => 'required|exists:unidad,ID_Unidad',
            'Contrasena' => 'required|string|min:6',
        ]);

        Personal_Medico::create($request->all());

        return redirect()->route('personal_medico.index')->with('success', 'Personal médico registrado correctamente.');
    }

    /**
     * Mostrar formulario de edición
     */
    public function edit($Ci_Personal_Medico)
    {
        $personal = Personal_Medico::findOrFail($Ci_Personal_Medico);

        $hospitales = Hospital::all();
        $categorias = Categoria::all();
        $unidades = Unidad::all();

        return view('personal_medico.edit', compact('personal', 'hospitales', 'categorias', 'unidades'));
    }

    /**
     * Actualizar personal médico
     */
    public function update(Request $request, $Ci_Personal_Medico)
    {
        $personal = Personal_Medico::findOrFail($Ci_Personal_Medico);

        $request->validate([
            'Nombres_PM' => 'required|string',
            'Apellido_P_PM' => 'required|string',
            'Apellido_M_PM' => 'required|string',
            'Telefono' => 'required|string',
            'Email' => 'required|email',
            'ID_Categoria' => 'required|exists:categoria,ID_Categoria',
            'ID_Hospital' => 'required|exists:hospital,ID_Hospital',
            'ID_Unidad' => 'required|exists:unidad,ID_Unidad',
            'Contrasena' => 'nullable|string|min:6',
        ]);

        // Si no se cambió la contraseña, no la actualiza
        $data = $request->all();
        if ($request->Contrasena == null) {
            unset($data['Contrasena']);
        }

        $personal->update($data);

        return redirect()->route('personal_medico.index')->with('success', 'Datos actualizados correctamente.');
    }

    /**
     * Eliminar personal médico
     */
    public function destroy($Ci_Personal_Medico)
    {
        $personal = Personal_Medico::findOrFail($Ci_Personal_Medico);
        $personal->delete();

        return redirect()->route('personal_medico.index')->with('success', 'Personal médico eliminado.');
    }
}
