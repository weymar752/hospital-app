<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\FichaMedicaController;
use App\Http\Controllers\PersonalMedicoController;
use App\Http\Controllers\PerfilController;



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
        ];
        return view('home', compact('hospitalCount', 'doctorCount', 'patientCount', 'routes'));
    } catch (\Exception $e) {
        Log::error('Error en home route: ' . $e->getMessage());
        return response('Error interno: ' . $e->getMessage(), 500);
    }
})->name('home');

Route::resource('pacientes', PacienteController::class);
Route::resource('hospitales', HospitalController::class);
Route::resource('fichas', FichaMedicaController::class);
Route::resource('personal_medico', PersonalMedicoController::class);
Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil');
// Ruta Login y Logout
Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login.process');
Route::match(['get', 'post'], '/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
// PAgina principal medicos
Route::get('/pagina_medicos/inicio', function () {
    return view('pagina_medicos.home');
})->name('pagina_medicos.home');
// Pagina principal pacientes
Route::get('/pagina_pacientes/inicio', function () {
    return view('pagina_pacientes.home');
})->name('pagina_pacientes.home');



Route::resource('fichas-medicas', FichaMedicaController::class);
Route::put('fichas-medicas/{id}/estado', [FichaMedicaController::class, 'updateEstado'])->name('fichas-medicas.updateEstado');