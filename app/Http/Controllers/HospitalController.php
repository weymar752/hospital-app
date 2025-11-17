<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function index()
    {
        $hospitales = Hospital::all();
        return view('hospitales.index', compact('hospitales'));
    }

    public function create()
    {
        return view('hospitales.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nombre_Hospital' => 'required',
            'Nivel_Hospital' => 'required',
            'Direccion_Hospital' => 'required',
        ]);

        Hospital::create($request->all());

        return redirect()->route('hospitales.index')->with('success', 'Hospital creado exitosamente.');
    }

    public function edit($id)
    {
        $hospital = Hospital::findOrFail($id);
        return view('hospitales.edit', compact('hospital'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nombre_Hospital' => 'required',
            'Nivel_Hospital' => 'required',
            'Direccion_Hospital' => 'required',
        ]);

        Hospital::findOrFail($id)->update($request->all());

        return redirect()->route('hospitales.index')->with('success', 'Hospital actualizado.');
    }

    public function destroy($id)
    {
        Hospital::destroy($id);
        return redirect()->route('hospitales.index')->with('success', 'Hospital eliminado.');
    }
}
