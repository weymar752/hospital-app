<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Personal_Medico;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'ci' => 'required',
            'contrasena' => 'required'
        ]);

        // Buscar paciente por CI y luego validar contraseña
        $paciente = Paciente::where('CI_Paciente', $request->ci)->first();
        if ($paciente && Hash::check($request->contrasena, $paciente->getRawOriginal('Contrasena'))) {
            session([
                'ci_usuario' => $paciente->CI_Paciente,
                'tipo_usuario' => 'paciente',
                'usuario' => $paciente // Mantener objeto para vistas
            ]);
            return redirect()->route('home');
        }

        // Buscar personal médico por CI y luego validar contraseña
        $medico = Personal_Medico::where('Ci_Personal_Medico', $request->ci)->first();
        if ($medico && Hash::check($request->contrasena, $medico->getRawOriginal('Contrasena'))) {
            session([
                'ci_usuario' => $medico->Ci_Personal_Medico,
                'tipo_usuario' => 'medico',
                'usuario' => $medico // Mantener objeto para vistas
            ]);
            return redirect()->route('home');
        }

        return back()->withErrors(['error' => 'CI o contraseña incorrectos']);
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('home');
    }
}
