<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\PersonalMedicoController;
use App\Http\Controllers\FichaMedicaController;
use App\Http\Controllers\HistorialMedicoController;
use App\Http\Controllers\PerfilController;

/*
|--------------------------------------------------------------------------
| Ruta Principal
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    try {
        $hospitalCount = \App\Models\Hospital::count();
        $doctorCount = \App\Models\Personal_Medico::count();
        $patientCount = \App\Models\Paciente::count();
        $routes = [
            'home' => route('home'),
            'login' => route('login'),
            'hospitales_index' => route('hospitales.index'),
            'pacientes_create' => route('pacientes.create'),
            'pacientes_index' => route('pacientes.index'),
            'personal_medico_index' => route('personal_medico.index'),
            'fichas_index' => route('fichas.index'),
            'fichas_create' => route('fichas.create'),
            'perfil' => route('perfil'),
            'historial_medico_index' => route('historial_medico.index'),
        ];
        return view('home', compact('hospitalCount', 'doctorCount', 'patientCount', 'routes'));
    } catch (\Exception $e) {
        Log::error('Error en home route: ' . $e->getMessage());
        return response('Error interno: ' . $e->getMessage(), 500);
    }
})->name('home');

/*
|--------------------------------------------------------------------------
| Autenticación
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::match(['get', 'post'], '/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Páginas Principales por Rol
|--------------------------------------------------------------------------
*/
Route::middleware(['medico'])->group(function () {
    Route::get('/pagina_medicos/inicio', function () {
        return view('pagina_medicos.home');
    })->name('pagina_medicos.home');
});

Route::middleware(['paciente'])->group(function () {
    Route::get('/pagina_pacientes/inicio', function () {
        return view('pagina_pacientes.home');
    })->name('pagina_pacientes.home');
});

/*
|--------------------------------------------------------------------------
| Recursos CRUD
|--------------------------------------------------------------------------
*/
// Hospitales - público
Route::resource('hospitales', HospitalController::class);

// Pacientes - solo para médicos
Route::middleware(['medico'])->group(function () {
    Route::resource('pacientes', PacienteController::class);
});

// Personal Médico - solo para médicos
Route::middleware(['medico'])->group(function () {
    Route::resource('personal_medico', PersonalMedicoController::class);
});

// Fichas Médicas - requiere autenticación
Route::middleware(['auth.custom'])->group(function () {
    Route::resource('fichas', FichaMedicaController::class);
});

/*
|--------------------------------------------------------------------------
| Fichas Médicas - Rutas Adicionales
|--------------------------------------------------------------------------
*/
Route::middleware(['auth.custom'])->group(function () {
    Route::put('fichas/{id}/estado', [FichaMedicaController::class, 'updateEstado'])->name('fichas.updateEstado');
    Route::get('fichas/horas-ocupadas', [FichaMedicaController::class, 'getHorasOcupadas'])->name('fichas.horasOcupadas');
});

/*
|--------------------------------------------------------------------------
| Historial Médico
|--------------------------------------------------------------------------
*/
Route::middleware(['auth.custom'])->group(function () {
    Route::get('/historial_medico', [HistorialMedicoController::class, 'index'])->name('historial_medico.index');
    Route::get('/historial_medico/create', [HistorialMedicoController::class, 'create'])->name('historial_medico.create');
    Route::post('/historial_medico/store', [HistorialMedicoController::class, 'store'])->name('historial_medico.store');
});

/*
|--------------------------------------------------------------------------
| Perfil de Usuario
|--------------------------------------------------------------------------
*/
Route::middleware(['auth.custom'])->group(function () {
    Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil');
});