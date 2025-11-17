@extends('layouts.app')

@section('content')
<main>
    <div class="form-container">
        <div class="profile-header">
            <div class="profile-avatar">
                <i class="fas fa-user-circle"></i>
            </div>
            <h1 class="profile-title">Mi Perfil</h1>
            <p class="profile-subtitle">Información personal y médica</p>
        </div>

        <div class="profile-content">
            @if(session()->has('usuario'))
                @if(session('tipo_usuario') === 'medico')
                    <!-- PERFIL DE PERSONAL MÉDICO -->
                    <div class="profile-grid">
                        <!-- Información Personal -->
                        <div class="profile-card">
                            <div class="card-header">
                                <i class="fas fa-user-md"></i>
                                <h3>Información Personal</h3>
                            </div>
                            <div class="card-body">
                                <div class="info-row">
                                    <span class="info-label">CI:</span>
                                    <span class="info-value">{{ session('usuario')->Ci_Personal_Medico }}</span>
                                </div>
                                <div class="info-row">
                                    <span class="info-label">Nombres:</span>
                                    <span class="info-value">{{ session('usuario')->Nombres_PM }}</span>
                                </div>
                                <div class="info-row">
                                    <span class="info-label">Apellido Paterno:</span>
                                    <span class="info-value">{{ session('usuario')->Apellido_P_PM }}</span>
                                </div>
                                <div class="info-row">
                                    <span class="info-label">Apellido Materno:</span>
                                    <span class="info-value">{{ session('usuario')->Apellido_M_PM }}</span>
                                </div>
                                <div class="info-row">
                                    <span class="info-label">Teléfono:</span>
                                    <span class="info-value">{{ session('usuario')->Telefono }}</span>
                                </div>
                                <div class="info-row">
                                    <span class="info-label">Email:</span>
                                    <span class="info-value">{{ session('usuario')->Email }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Información Profesional -->
                        <div class="profile-card">
                            <div class="card-header">
                                <i class="fas fa-briefcase-medical"></i>
                                <h3>Información Profesional</h3>
                            </div>
                            <div class="card-body">
                                @if(isset($categoria) && $categoria)
                                <div class="info-row">
                                    <span class="info-label">Categoría:</span>
                                    <span class="info-value">{{ $categoria->Nombre_Categoria }}</span>
                                </div>
                                @endif

                                @if(isset($especialidad) && $especialidad)
                                <div class="info-row">
                                    <span class="info-label">Especialidad:</span>
                                    <span class="info-value">{{ $especialidad->Nombre_Especialidad }}</span>
                                </div>
                                @endif

                                @if(isset($hospital) && $hospital)
                                <div class="info-row">
                                    <span class="info-label">Hospital:</span>
                                    <span class="info-value">{{ $hospital->Nombre_Hospital }}</span>
                                </div>
                                <div class="info-row">
                                    <span class="info-label">Nivel Hospital:</span>
                                    <span class="info-value">{{ $hospital->Nivel_Hospital }}</span>
                                </div>
                                @endif

                                @if(isset($unidad) && $unidad)
                                <div class="info-row">
                                    <span class="info-label">Unidad:</span>
                                    <span class="info-value">{{ $unidad->Nombre_Unidad }}</span>
                                </div>
                                @endif

                                @if(isset($departamento) && $departamento)
                                <div class="info-row">
                                    <span class="info-label">Departamento:</span>
                                    <span class="info-value">{{ $departamento->Nombre_Departamento }}</span>
                                </div>
                                @endif
                            </div>
                        </div>

                        <!-- Estadísticas -->
                        <div class="profile-card">
                            <div class="card-header">
                                <i class="fas fa-chart-bar"></i>
                                <h3>Estadísticas</h3>
                            </div>
                            <div class="card-body">
                                <div class="stat-row">
                                    <div class="stat-item">
                                        <span class="stat-number">{{ $totalPacientes ?? '0' }}</span>
                                        <span class="stat-label">Pacientes Atendidos</span>
                                    </div>
                                    <div class="stat-item">
                                        <span class="stat-number">{{ $totalFichas ?? '0' }}</span>
                                        <span class="stat-label">Fichas Médicas</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                @elseif(session('tipo_usuario') === 'paciente')
                    <!-- PERFIL DE PACIENTE -->
                    <div class="profile-grid">
                        <!-- Información Personal -->
                        <div class="profile-card">
                            <div class="card-header">
                                <i class="fas fa-user"></i>
                                <h3>Información Personal</h3>
                            </div>
                            <div class="card-body">
                                <div class="info-row">
                                    <span class="info-label">CI:</span>
                                    <span class="info-value">{{ session('usuario')->CI_Paciente }}</span>
                                </div>
                                <div class="info-row">
                                    <span class="info-label">Nombres:</span>
                                    <span class="info-value">{{ session('usuario')->Nombres }}</span>
                                </div>
                                <div class="info-row">
                                    <span class="info-label">Apellido Paterno:</span>
                                    <span class="info-value">{{ session('usuario')->Apellido_P }}</span>
                                </div>
                                <div class="info-row">
                                    <span class="info-label">Apellido Materno:</span>
                                    <span class="info-value">{{ session('usuario')->Apellido_M }}</span>
                                </div>
                                <div class="info-row">
                                    <span class="info-label">Fecha de Nacimiento:</span>
                                    <span class="info-value">{{ \Carbon\Carbon::parse(session('usuario')->Fecha_Nacimiento)->format('d/m/Y') }}</span>
                                </div>
                                <div class="info-row">
                                    <span class="info-label">Edad:</span>
                                    <span class="info-value">{{ \Carbon\Carbon::parse(session('usuario')->Fecha_Nacimiento)->age }} años</span>
                                </div>
                            </div>
                        </div>

                        <!-- Información Médica -->
                        <div class="profile-card">
                            <div class="card-header">
                                <i class="fas fa-heartbeat"></i>
                                <h3>Información Médica</h3>
                            </div>
                            <div class="card-body">
                                <div class="info-row">
                                    <span class="info-label">Tipo de Sangre:</span>
                                    <span class="info-value blood-type">{{ session('usuario')->Tipo_Sangre ?? 'No especificado' }}</span>
                                </div>
                                <div class="info-row">
                                    <span class="info-label">Alergias:</span>
                                    <span class="info-value">{{ session('usuario')->Alergias ?? 'Ninguna' }}</span>
                                </div>
                                @if(isset($hospital) && $hospital)
                                <div class="info-row">
                                    <span class="info-label">Hospital Asignado:</span>
                                    <span class="info-value">{{ $hospital->Nombre_Hospital }}</span>
                                </div>
                                <div class="info-row">
                                    <span class="info-label">Nivel Hospital:</span>
                                    <span class="info-value">{{ $hospital->Nivel_Hospital }}</span>
                                </div>
                                @endif
                            </div>
                        </div>

                        <!-- Historial Médico -->
                        <div class="profile-card">
                            <div class="card-header">
                                <i class="fas fa-file-medical"></i>
                                <h3>Historial Médico</h3>
                            </div>
                            <div class="card-body">
                                <div class="stat-row">
                                    <div class="stat-item">
                                        <span class="stat-number">{{ $totalFichas ?? '0' }}</span>
                                        <span class="stat-label">Fichas Médicas</span>
                                    </div>
                                    <div class="stat-item">
                                        <span class="stat-number">{{ $totalCitas ?? '0' }}</span>
                                        <span class="stat-label">Citas Registradas</span>
                                    </div>
                                </div>
                                @if(isset($ultimaCita) && $ultimaCita)
                                <div class="info-row">
                                    <span class="info-label">Última Cita:</span>
                                    <span class="info-value">{{ \Carbon\Carbon::parse($ultimaCita->Fecha_Cita)->format('d/m/Y') }}</span>
                                </div>
                                @endif
                            </div>
                        </div>

                    </div>
                @endif

                <!-- Botones de Acción -->
                <div class="profile-actions">
                    <button class="btn-primary" onclick="location.href='/Hospital/public/perfil/editar'">
                        <i class="fas fa-edit"></i>
                        Editar Perfil
                    </button>
                    <button class="btn-secondary" onclick="location.href='/Hospital/public/citas'">
                        <i class="fas fa-calendar"></i>
                        Ver Mis Citas
                    </button>
                    @if(session('tipo_usuario') === 'paciente')
                    <button class="btn-secondary" onclick="location.href='/Hospital/public/fichas'">
                        <i class="fas fa-file-medical"></i>
                        Ver Ficha Médica
                    </button>
                    @endif
                </div>

            @else
                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle"></i>
                    No hay información de usuario disponible. Por favor, inicie sesión.
                </div>
            @endif
        </div>
    </div>
</main>
@endsection