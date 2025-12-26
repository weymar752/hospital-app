<?php
// app/Http/Controllers/PerfilController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal_Medico;
use App\Models\Paciente;
use App\Models\Hospital;
use App\Models\Categoria;
use App\Models\Especialidad;
use App\Models\Unidad;
use App\Models\Departamento;
use App\Models\Ficha_Medica;

class PerfilController extends Controller
{
    public function index()
    {
        $usuario = session('usuario');
        $tipoUsuario = session('tipo_usuario');
        
        $data = [];
        
        if ($tipoUsuario === 'medico') {
            // Cargar datos relacionados para personal médico
            $data['categoria'] = Categoria::find($usuario->ID_Categoria);
            $data['hospital'] = Hospital::find($usuario->ID_Hospital);
            $data['unidad'] = Unidad::find($usuario->ID_Unidad);
            
            if ($data['categoria']) {
                $data['especialidad'] = Especialidad::find($data['categoria']->ID_Especialidad);
            }
            
            if ($data['unidad']) {
                $data['departamento'] = Departamento::find($data['unidad']->ID_Departamento);
            }
            
            // Estadísticas
            $data['totalPacientes'] = Ficha_Medica::where('Ci_Personal_Medico', $usuario->Ci_Personal_Medico)
                ->distinct('CI_Paciente')
                ->count('CI_Paciente');
                
            $data['totalFichas'] = Ficha_Medica::where('Ci_Personal_Medico', $usuario->Ci_Personal_Medico)->count();
            
        } elseif ($tipoUsuario === 'paciente') {
            // Cargar datos relacionados para paciente
            $data['hospital'] = Hospital::find($usuario->ID_Hospital);
            
            // Estadísticas
            $data['totalFichas'] = Ficha_Medica::where('CI_Paciente', $usuario->CI_Paciente)->count();
            $data['totalCitas'] = Ficha_Medica::where('CI_Paciente', $usuario->CI_Paciente)->count();
            $data['ultimaCita'] = Ficha_Medica::where('CI_Paciente', $usuario->CI_Paciente)
                ->orderBy('Fecha_Cita', 'desc')
                ->first();
        }
        
        return view('perfil.index', $data);
    }
}