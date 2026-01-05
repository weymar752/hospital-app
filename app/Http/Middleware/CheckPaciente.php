<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPaciente
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar si el usuario ha iniciado sesión
        if (!session()->has('usuario')) {
            return redirect()->route('login')
                ->with('error', 'Debes iniciar sesión para acceder a esta página.');
        }

        // Verificar si el usuario es paciente
        if (session('tipo_usuario') !== 'paciente') {
            return redirect()->route('home')
                ->with('error', 'No tienes permisos para acceder a esta página. Solo pacientes.');
        }

        return $next($request);
    }
}
